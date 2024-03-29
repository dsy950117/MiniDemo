<?php


namespace App\service;

use App\Exceptions\weChatException;
use Exception;
use App\Models\User;
use App\Exceptions\TokenException;

class UserToken extends Token
{
    protected $code;
    protected $wxappID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this->code=$code;
        $this->wxappID=config('wx.app_id');
        $this->wxAppSecret=config('wx.app_secret');
        $this->wxLoginUrl=sprintf(config('wx.login_url'),
        $this->wxappID,$this->wxAppSecret,$this->code);
    }

    public function get()
    {
       $result=curl_get($this->wxLoginUrl);
       $wxResult=json_decode($result,true);
       if (empty($wxResult)){
           throw new Exception('获取session_key及openID时异常,微信内部错误');
       }else{
           $loginFail=array_key_exists('errcode',$wxResult);
           if ($loginFail){
                $this->processLoginError($wxResult);
           }else{
                $this->grantToken($wxResult);
           }
       }
    }

    private function grantToken($wxResult){
        // 拿到openid
        // 数据库里看一下,这个openid是不是已经存在
        // 如果存在 则不处理,如果不存在则新增一条user记录
        // 生成令牌,准备缓存数据,写入缓存
        // 把令牌返回到客户端去
        // key:令牌
//        value:wxResult,uid,scope
        $openid=$wxResult['openid'];
        $user=User::getByOpenID($openid);
        if($user){
          $uid=$user->id;
        }else{
            $uid=$this->newUser($openid);
        }
        $cachedValue=$this->prepareCachedVaule($wxResult,$uid);
        $token=$this->saveToCache($cachedValue);
        return $token;
    }

    private function saveToCache($cachedValue){
        $key=self::generateToken();
        $value=json_encode($cachedValue);
        $expire_in=config('setting.expire_in');
        $request=cache($key,$value,$expire_in);
        if (!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode'=>10005
            ]);
        }
        return $key;
    }

    private function prepareCachedVaule($wxResult,$uid){
        $cachedValue=$wxResult;
        $cachedValue['uid']=$uid;
        $cachedValue['scope']=16;
        return $cachedValue;
    }

    private  function newUser($openid){
        $user = User::query()->create([
            'openid'=>$openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult)
    {
        throw new weChatException([
            'msg'=>$wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }
}