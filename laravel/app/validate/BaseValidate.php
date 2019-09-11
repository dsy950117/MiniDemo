<?php
namespace App\validate;
use App\Exceptions\ParameterException;
use Illuminate\Http\Request;

class BaseValidate
{
    public function goCheck(Request $request)
    {
        // 获取http传入的参数
        // 对这些参数做检验
//        $request = Request::input();
        $params = $request->route('id');
//        var_dump($params);die;
        $result=$this->batch()->check($params);
        if (!$result) {
            $e=new ParameterException([
                'msg'=>$this->error,

            ]);
//            $e->msg=$this->error;
//            $e->errorCode=10002;
            throw $e;
//            $error = $this->error;
//            throw new Exception($error);
        } else {
            return true;
        }
    }


}