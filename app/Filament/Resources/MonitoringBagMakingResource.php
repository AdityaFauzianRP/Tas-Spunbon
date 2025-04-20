<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonitoringBagMakingResource\Pages;
use App\Models\MesinJadwal;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;


class MonitoringBagMakingResource extends Resource
{
    protected static ?string $model = MesinJadwal::class;

    protected static ?string $navigationGroup = 'Produksi';
    protected static ?string $navigationLabel = 'Monitoring Bag Making';
    protected static ?string $label = 'Monitoring Bag Making';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

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

            ->modifyQueryUsing(fn($query) => $query->join('mesin', 'mesin_jadwal.mesin_id', '=', 'mesin.id')->where('mesin.nama_mesin', 'Bag Making'))->columns([
                TextColumn::make('mesin.kode_mesin')->label('Mesin'),
                TextColumn::make('tanggal')->date(),
                TextColumn::make('produk_real')->label('Produk Real'),
                TextColumn::make('qty')->label('Jumlah Meter'),
                TextColumn::make('output')->label('Hasil Bersih'),
                TextColumn::make('waste')
                    ->label('Waste')
                    ->getStateUsing(function ($record) {
                        return ($record->qty && $record->output)
                            ? $record->qty - $record->output
                            : '-';
                    }),
                TextColumn::make('waste_percentage')
                    ->label('Waste (%)')
                    ->getStateUsing(function ($record) {
                        if ($record->qty && $record->output) {
                            $waste = $record->qty - $record->output;
                            return number_format(($waste / $record->qty) * 100, 2) . '%';
                        }
                        return '-';
                    }),
            ])
            ->filters([
                SelectFilter::make('mesin_id')
                    ->relationship('mesin', 'kode_mesin', fn($query) => $query->where('nama_mesin', 'Bag Making'))
                    ->label('Mesin')
            ])
            ->actions([])
            ->bulkActions([]);
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
            'index' => Pages\ListMonitoringBagMakings::route('/'),
            'create' => Pages\CreateMonitoringBagMaking::route('/create'),
            'edit' => Pages\EditMonitoringBagMaking::route('/{record}/edit'),
        ];
    }
}
