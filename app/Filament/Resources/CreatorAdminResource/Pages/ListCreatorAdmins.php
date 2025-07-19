<?php

namespace App\Filament\Resources\CreatorAdminResource\Pages;

use App\Filament\Resources\CreatorAdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCreatorAdmins extends ListRecords
{
    protected static string $resource = CreatorAdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
