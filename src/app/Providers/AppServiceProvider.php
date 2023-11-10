<?php

namespace App\Providers;

use App\Core\Port\IPacienteRepository;
use App\Repository\PacienteRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IPacienteRepository::class,
            PacienteRepository::class
        );
        /*
        $this->app->bind(
            IEnderecoRepository::class,
            EnderecoRepository::class
        );
        */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
