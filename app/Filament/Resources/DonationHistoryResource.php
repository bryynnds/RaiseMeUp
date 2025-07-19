<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationHistoryResource\Pages;
use App\Filament\Resources\DonationHistoryResource\RelationManagers;
use App\Models\Donation;
use Filament\Tables\Columns\TextColumn;
use App\Models\DonationHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonationHistoryResource extends Resource
{
    protected static ?string $model = Donation::class;
    protected static ?string $navigationLabel = 'Data Donasi';
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Data';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['supporter', 'creator.creatorProfile', 'transactions']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('supporter.name')
                    ->label('Supporter')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('creator.creatorProfile.nickname')
                    ->label('Kreator')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('amount')
                    ->label('Jumlah Donasi')
                    ->money('IDR', true)
                    ->sortable(),

                TextColumn::make('message')
                    ->label('Pesan')
                    ->wrap(),

                TextColumn::make('transactions.status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'settlement',
                        'danger' => 'cancel,expire,failed',
                    ]),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),

                // TextColumn::make('updated_at')
                //     ->label('Diperbarui')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
             'index' => Pages\ListDonationHistories::route('/'),
        ];
    }
}
