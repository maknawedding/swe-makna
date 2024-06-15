<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterResource\Pages;
use App\Filament\Resources\MasterResource\RelationManagers;
use App\Models\Master;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class MasterResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Master::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_event')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penyelenggara')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('waktu')
                    ->required(),
                Forms\Components\TextInput::make('hargapublish_gold')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('hargapublish_silver')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kota')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('provinsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('negara')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_event')
                    ->searchable(),
                Tables\Columns\TextColumn::make('penyelenggara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('waktu')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hargapublish_gold')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hargapublish_silver')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('negara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
            'index' => Pages\ListMasters::route('/'),
            'create' => Pages\CreateMaster::route('/create'),
            'edit' => Pages\EditMaster::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any'
        ];
    }
}
