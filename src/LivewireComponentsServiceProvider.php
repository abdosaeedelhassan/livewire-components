<?php


namespace AsayHome\LivewireComponents;

use AsayHome\LivewireComponents\Components\Select2;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/livewire-components.php' => config_path('livewire-components.php'),
        ]);
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang', 'livewire-components');
        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/livewire-components'),
        ]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-components');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/livewire-components'),
        ]);


        /**
         * Registering the components
         */

        Livewire::component('livewire-compnents-select', Select2::class);


        /**
         * Styles directive
         */
        Blade::directive('livewireComponentsStyles', function () {
            return `
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            `;
        });
        /**
         * Scripts directive
         */
        Blade::directive('livewireComponentsScripts', function () {
            return `
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            `;
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/livewire-components.php',
            'livewire-components'
        );
    }
}
