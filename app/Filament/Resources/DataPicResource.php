<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPicResource\Pages;
use App\Models\DataPic;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class DataPicResource extends Resource
{
    protected static ?string $model = DataPic::class;

    protected static ?string $navigationLabel = 'Data PIC';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama PIC')
                ->required()
                ->maxLength(100),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->label('ID')->sortable(),
            TextColumn::make('nama')->label('Nama PIC')->searchable()->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataPics::route('/'),
            'create' => Pages\CreateDataPic::route('/create'),
            'edit' => Pages\EditDataPic::route('/{record}/edit'),
        ];
    }
}
