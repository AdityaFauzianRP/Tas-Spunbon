<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MesinResource\Pages;
use App\Models\Mesin;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\NumberInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class MesinResource extends Resource
{
    protected static ?string $model = Mesin::class;

    protected static ?string $navigationLabel = 'Data Mesin';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('kode_mesin')
                ->required()
                ->maxLength(50),
            TextInput::make('nama_mesin')
                ->required()
                ->maxLength(100),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_mesin')->sortable()->searchable(),
                TextColumn::make('nama_mesin')->sortable()->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMesins::route('/'),
            'create' => Pages\CreateMesin::route('/create'),
            'edit' => Pages\EditMesin::route('/{record}/edit'),
        ];
    }
}
