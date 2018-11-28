<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $indexNamespace = 'App\Http\Controllers\Index';//PC端
    protected $adminNamespace = 'App\Http\Controllers\Admin';//管理后台
    protected $apiNamespace = 'App\Http\Controllers\Api';//api

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
//        $this->mapApiRoutes();
//
//        $this->mapWebRoutes();

        /**
         * 根据域名前缀进行模块绑定
         */
        $sld_prefix = isset($_SERVER['HTTP_HOST'])?explode('.',$_SERVER['HTTP_HOST'])[0]:'';
        if(config('base.ADMIN_URL') == $sld_prefix){
            $this->mapAdminRoutes();
        }elseif(config('base.API_URL') == $sld_prefix){
            $this->mapApiRoutes();
        }else{
            $this->mapIndexRoutes();
        }

    }

    /**
     * 管理后台
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/admin.php'));
    }



    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapIndexRoutes()
    {
        Route::middleware('web')
             ->namespace($this->indexNamespace)
             ->group(base_path('routes/index.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')
             ->namespace($this->apiNamespace)
             ->group(base_path('routes/api.php'));
    }
}
