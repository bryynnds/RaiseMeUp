<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CreatorAdminResource\Pages;
use App\Filament\Resources\CreatorAdminResource\RelationManagers;
use App\Models\CreatorAdmin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;
use App\Models\CreatorProfile;
use App\Models\Donation;
use App\Models\Transaction;
use App\Models\Like;
use Filament\Tables\Filters\Textfilter;


class CreatorAdminResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Halaman Kreator';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Data Kreator';

    public static function getEloquentQuery(): Builder
    {
        return User::where('role', 'kreator')->with('creatorProfile');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('creatorProfile.creator_id')
                    ->label('Creator ID')
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                // TextColumn::make('name')
                //     ->label('Nama')
                //     ->sortable()
                //     ->searchable(),

                TextColumn::make('creatorProfile.nickname')
                    ->label('Nickname')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('likes_count')
                    ->label('Like')
                    ->counts('likes')
                    ->sortable(),

                TextColumn::make('jumlah_supporter')
                    ->label('Supporter')
                    ->getStateUsing(function (User $record) {
                        return \App\Models\Donation::where('creator_id', $record->id)
                            ->distinct('supporter_id')
                            ->count('supporter_id');
                    })
                    ->sortable(),

                TextColumn::make('creatorProfile.total_income')
                    ->label('Saldo')
                    ->money('IDR', true)
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('nickname')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('nickname')
                            ->label('Cari Nickname'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->whereHas('creatorProfile', function ($q) use ($data) {
                            if ($data['nickname']) {
                                $q->where('nickname', 'like', '%' . $data['nickname'] . '%');
                            }
                        });
                    }),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCreatorAdmins::route('/'),
        ];
    }
}
