<?php

namespace Wavvel\CommonPhp;

use Illuminate\Support\ServiceProvider;
use Wavvel\CommonPhp\Laravel\BladeDirectives;

class CommonPhpServiceProvider extends ServiceProvider {
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot(): void {
    // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'wavvel');
    // $this->loadViewsFrom(__DIR__.'/../resources/views', 'wavvel');
    // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    // $this->loadRoutesFrom(__DIR__.'/routes.php');

    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {
      $this->bootForConsole();
    }

    BladeDirectives::registerCustomBladeDirectives();
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register(): void {
    $this->mergeConfigFrom(__DIR__.'/../config/common-php.php', 'common-php');

    // Register the service the package provides.
    $this->app->singleton('common-php', function ($app) {
      return new CommonPhp;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return ['common-php'];
  }

  /**
   * Console-specific booting.
   *
   * @return void
   */
  protected function bootForConsole(): void {
    // Publishing the configuration file.
    $this->publishes([
      __DIR__.'/../config/common-php.php' => config_path('common-php.php'),
    ], 'common-php.config');

    // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/wavvel'),
        ], 'common-php.views');*/

    // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/wavvel'),
        ], 'common-php.views');*/

    // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/wavvel'),
        ], 'common-php.views');*/

    // Registering package commands.
    // $this->commands([]);
  }
}
