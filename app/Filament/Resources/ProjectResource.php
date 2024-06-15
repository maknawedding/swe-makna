<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class ProjectResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('title')
                    ->required()
                    ->options([
                        'Sumatra Selatan Wedding Expo' => 'Sumsel Wedding Expo',
                        'Wedding' => 'Wedding',
                        ]),
                Forms\Components\Select::make('client_id')
                    ->relationship('client', 'nama_tenant')
                    ->label('Nama Tenant')
                    ->required(),
                Forms\Components\DatePicker::make('tgl_event')
                    ->placeholder('05 - 07 Juli 2024')
                    ->label('Tgl. Event'),
                Forms\Components\TextArea::make('rekanan_tenant')
                    ->required()
                    ->label('Rekanan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_jual')
                    ->required()
                    ->numeric()
                    ->label('Harga Jual')
                    ->prefix('IDR ')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_tenant')
                    ->required()
                    ->label('Nomor Tenant')
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->required()
                    ->label('Keterangan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.nama_tenant')
                    ->sortable()
                    ->label('Nama Project')
                    ->description(fn (Project $record): string => $record->title) ,
                Tables\Columns\TextColumn::make('tgl_event')
                    ->searchable()
                    ->label('Tgl. Event'),
                Tables\Columns\TextColumn::make('rekanan_tenant')
                    ->searchable()
                    ->label('Rekanan Tenant'),
                Tables\Columns\TextColumn::make('harga_jual')
                    ->searchable()
                    ->label('Harga Jual')
                    ->money('IDR', true),
                Tables\Columns\TextColumn::make('nomor_tenant')
                    ->searchable()
                    ->label('Nomor Tenant'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
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
