<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\ServiceProvider;
use App\Observers\StudentObserver;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema:: defaultStringLength(191);
        Student::observe(StudentObserver::class);
    }
}
