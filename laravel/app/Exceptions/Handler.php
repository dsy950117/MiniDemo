<?php

namespace App\Exceptions;

use Exception;
use http\Env\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    private $code;
    private $msg;
    private $errorCode;
    // 需要返回客户端当前请求的URL路径

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {

//        if ($exception instanceof BaseException) {
//            // 如果是自定义的异常
//            $this->code = $exception->code;
//            $this->msg = $exception->msg;
//            $this->errorCode = $exception->errorCode;
//        } else {
//
//            if (config('APP_DEBUG')) {
//                return parent::render($request, $exception);
//            } else {
//                $this->code = 500;
//                $this->msg = '服务器内部错误,不想告诉你';
//                $this->errorCode = 999;
//                $this->report($exception);
//            }

//        }
//
//        $result = [
//            'msg' => $this->msg,
//            'error_code' => $this->errorCode,
//            'request_url' => $request->url(),
//        ];
//        return response($result, $this->code);

    }

//    private function recordErrorLog(Exception $exception){
//        Log::init([
//            'type'=>'File',
//            'path'=>LOG_PATH,
//            'level'=>['error']
//        ]);
//        Log::record($exception->getMessage(),'error');
//    }


}
