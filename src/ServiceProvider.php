<?php
namespace Rabsanaco\Locale;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


class ServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.
        $this->app->singleton(LocaleInterface::class, function($app){
           return new Locale($app);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/locale.php';

        $this->publishes([$configPath => config_path('rabsanaco-locale.php')]);

        $this->mergeConfigFrom($configPath, 'rabsanaco-locale');
    }
}
