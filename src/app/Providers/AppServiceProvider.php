<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('userstamps', function (){
            $this->foreignUuid('created_by')->nullable();
            $this->foreignUuid('updated_by')->nullable();
            $this->foreignUuid('deleted_by')->nullable();
        });

        Blueprint::macro('general', function (){
            $this->userstamps();
            $this->boolean('is_synced')->default(false);
            $this->timestamps();
            $this->softDeletes();
        });
    }
}
