<?php
namespace Former;

use Illuminate\Support\ServiceProvider;

define('FORMER_VERSION', '3.0.0');

class FormerServiceProvider extends ServiceProvider
{
  public function register()
  {
    // Register config file
    $this->app['config']->package('anahkiasen/former', __DIR__.'/../config');

    $this->registerBindings();
  }

  /**
   * Register the application bindings.
   *
   * @return void
   */
  public function registerBindings()
  {
    $this->app['former'] = $this->app->share(function($app) {
      return new Former($app);
    });

    $this->app['former.framework'] = $this->app->share(function($app) {
      return new Framework($app);
    });

    $this->app['former.helpers'] = $this->app->share(function($app) {
      return new Helpers($app);
    });

    $this->app['former.laravel.form'] = $this->app->share(function($app) {
      return new \Laravel\Form($app);
    });

    $this->app['former.laravel.html'] = $this->app->share(function($app) {
      return new \Laravel\HTML($app);
    });

    $this->app['former.laravel.file'] = $this->app->share(function($app) {
      return new \Laravel\File($app);
    });
  }
}
