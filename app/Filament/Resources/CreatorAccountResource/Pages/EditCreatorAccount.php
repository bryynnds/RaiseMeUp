<?php

namespace App\Filament\Resources\CreatorAccountResource\Pages;

use App\Filament\Resources\CreatorAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreatorAccount extends EditRecord
{
    protected static string $resource = CreatorAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
