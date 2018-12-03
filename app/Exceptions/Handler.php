<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{


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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
//    public function render($request, Exception $exception)
//    {
//        return parent::render($request, $exception);
//    }

    /**
     * Created by xiaosong
     * E-mail:4155433@gmail.com
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response|static
     * 重写laravel异常处理
     */
    public function render($request, Exception $exception)
    {

        if ($this->shouldReturn()){ //ajax或api访问时统一返回错误

            if ($exception instanceof  ValidationException){
                $errorMsg = $exception->validator->errors()->first();
            }elseif ($exception instanceof ModelNotFoundException){
                $errorMsg = $exception->getMessage();
            }elseif ($exception instanceof NotFoundHttpException){
                $errorMsg = '路由错误';
            }elseif ($exception instanceof MethodNotAllowedHttpException){
                $errorMsg = '请求方式错误';
            }else{
                $errorMsg = $exception->getTraceAsString();
            }
             return error_exception(0,$errorMsg);
        }
        return parent::render($request, $exception);
    }

    /**
     * Created by xiaosong
     * E-mail:4155433@gmail.com
     * @return bool
     * 判断是否拦截异常方法
     */
    public function shouldReturn(){

        return false;
        $sld_prefix = isset($_SERVER['HTTP_HOST'])?explode('.',$_SERVER['HTTP_HOST'])[0]:'';

        //判断是否拦截异常
        if (

            request()->ajax() ||
            strstr(config('base.API_URL'),$sld_prefix) ||
            request()->input('_ajax') == config('base.var_ajax')
        )
        {
            return true;

        }else{
            return false;
        }

    }

}
