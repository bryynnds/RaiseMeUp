<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreatorProfileResource\Pages;
use App\Filament\Resources\CreatorProfileResource\RelationManagers;
use App\Models\CreatorProfile;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CreatorProfileResource extends Resource
{
    protected static ?string $model = CreatorProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nickname')->required(),
            Forms\Components\TextInput::make('job')->label('Profesi'),
            Forms\Components\Textarea::make('bio'),
            Forms\Components\TextInput::make('goal_amount')->numeric(),
            Forms\Components\TextInput::make('current_amount')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('creator_id')
                    ->label('Creator ID')
                    ->url(fn() => route('filament.admin.resources.users.index'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->url(fn() => route('filament.admin.resources.users.index'))
                    ->searchable()
                    ->sortable(),


                Tables\Columns\TextColumn::make('nickname')->searchable(),
                Tables\Columns\TextColumn::make('job')->searchable(),
                Tables\Columns\TextColumn::make('goal_amount')->money('IDR'),
                Tables\Columns\TextColumn::make('current_amount')->money('IDR'),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCreatorProfiles::route('/'),
            // 'create' => Pages\CreateCreatorProfile::route('/create'),
            'edit' => Pages\EditCreatorProfile::route('/{record}/edit'),
        ];
    }
}
