<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;

class StatsOverview extends Widget
{
    protected static string $view = 'filament.widgets.stats-overview-custom';

    public function getCards(): array
    {
        return [
            Card::make('Total Pengguna', User::whereIn('role', ['kreator', 'supporter'])->count()),
            Card::make('Total Kreator', User::where('role', 'kreator')->count()),
            Card::make('Total Admin', User::where('role', 'admin')->count()),
            Card::make('Total Supporter', User::where('role', 'supporter')->count()),
            Card::make('Total Pendaftar Hari Ini', User::whereDate('created_at', today())->count()),
        ];
    }

    // public static function canView(): bool
    // {
    //     return true;
    // }

    public function getColumnSpan(): int | string | array
    {
        return 'full';
    }
}
