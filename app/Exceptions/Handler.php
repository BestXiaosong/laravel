<?php

namespace App\Exceptions;

use App\Api\Helpers\Api\ExceptionReport;
use App\Helpers\ApiResponse;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    use ApiResponse;

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



    public function render($request, Exception $exception)
    {

//        var_dump($exception->getMessage());exit;





        // 将方法拦截到自己的ExceptionReport
//        $reporter = ExceptionReport::make($exception);

//        dd($exception);exit;


        if ($this->shouldReturn()){
            return $this->failed($exception->getMessage(),400);
//            $this->failed($exception->getMessage(),$exception->getCode());


//
//           var_dump($exception->getMessage());
//
//            var_dump($exception->getMessage());exit;
//
//            var_dump(  $exception->getMessage());exit;


//            return $reporter->report();
        }
//        return $this->failed($exception->getMessage(),400);
        return parent::render($request, $exception);
    }

    public function shouldReturn(){

        //判断是否拦截异常
        return true;
    }

}
