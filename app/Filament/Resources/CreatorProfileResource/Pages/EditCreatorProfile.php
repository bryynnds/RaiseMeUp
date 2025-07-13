<?php

namespace App\Filament\Resources\CreatorProfileResource\Pages;

use App\Filament\Resources\CreatorProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreatorProfile extends EditRecord
{
    protected static string $resource = CreatorProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
