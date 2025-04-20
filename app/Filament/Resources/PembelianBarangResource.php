<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianBarangResource\Pages;
use App\Models\PembelianBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use App\Models\DataPic;

class PembelianBarangResource extends Resource
{
    protected static ?string $model = PembelianBarang::class;

    protected static ?string $navigationLabel = 'Pembelian Barang';
    protected static ?string $navigationGroup = 'Finance';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_barang')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('harga')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxLength(15),
            Forms\Components\TextInput::make('alamat_toko')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('no_telpon_toko')
                ->required()
                ->maxLength(20),
            Forms\Components\Select::make('yang_pergi_beli')
                ->label('Yang Pergi Beli')
                ->options(DataPic::all()->pluck('nama', 'nama'))
                ->required()
                ->searchable(),        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')->limit(50),
                Tables\Columns\TextColumn::make('harga')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('alamat_toko')->limit(100),
                Tables\Columns\TextColumn::make('no_telpon_toko')->limit(20),
                Tables\Columns\TextColumn::make('yang_pergi_beli')->limit(50),
            ])
            ->filters([
                // Bisa ditambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembelianBarangs::route('/'),
            'create' => Pages\CreatePembelianBarang::route('/create'),
            'edit' => Pages\EditPembelianBarang::route('/{record}/edit'),
        ];
    }
}
