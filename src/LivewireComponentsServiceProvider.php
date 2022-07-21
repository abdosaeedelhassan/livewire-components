<?php


namespace AsayHome\LivewireComponents;

use Illuminate\Support\ServiceProvider;

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
    }
}
