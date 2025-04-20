<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataProsesResource\Pages;
use App\Models\DataProses;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class DataProsesResource extends Resource
{
    protected static ?string $model = DataProses::class;

    protected static ?string $navigationLabel = 'Data Proses';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('nama_proses')
                ->label('Nama Proses')
                ->required()
                ->maxLength(100),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->label('ID')->sortable(),
            TextColumn::make('nama_proses')->label('Nama Proses')->searchable()->sortable(),
        ])
        ->filters([
            // Optional: Add filters if needed
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataProses::route('/'),
            'create' => Pages\CreateDataProses::route('/create'),
            'edit' => Pages\EditDataProses::route('/{record}/edit'),
        ];
    }
}
