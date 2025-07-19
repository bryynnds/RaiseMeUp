<?php

namespace App\Filament\Resources\DonationHistoryResource\Pages;

use App\Filament\Resources\DonationHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonationHistory extends EditRecord
{
    protected static string $resource = DonationHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
