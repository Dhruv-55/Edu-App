<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
 
    public function boot()
    {
        $this->configureRateLimiting();
        parent::boot();
       Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
    
    public function map(){
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapStudentRoutes();
        $this->mapTeacherRoutes();
        $this->mapParentsRoutes();
    }

    protected function mapWebRoutes(){
        Route::middleware('web')->group(base_path('routes/web.php'));
        
    }

    protected function mapAdminRoutes(){
        Route::middleware('web')
        ->group(base_path('routes/admin.php')); 
    }



    protected function mapStudentRoutes(){
        Route::middleware('web')
        ->group(base_path('routes/student.php'));
    }
    protected function mapTeacherRoutes(){
        Route::middleware('web')
        ->group(base_path('routes/teacher.php'));
    }
    protected function mapParentsRoutes(){
        Route::middleware('web')
        ->group(base_path('routes/parents.php'));
    }
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
