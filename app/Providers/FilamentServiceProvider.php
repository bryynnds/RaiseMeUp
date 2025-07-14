<?php

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            Gate::define('viewFilament', function ($user) {
                return $user->role === 'admin';
            });
        });
    }
}
