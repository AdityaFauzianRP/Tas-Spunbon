<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MesinJadwalResource\Pages;
use App\Models\Mesin;
use App\Models\MesinJadwal;
use App\Models\DataPic;
use App\Models\DataProses;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class MesinJadwalResource extends Resource
{
    protected static ?string $model = MesinJadwal::class;

    protected static ?string $navigationLabel = 'Jadwal Mesin';
    protected static ?string $navigationGroup = 'Produksi';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Select::make('mesin_id')
                ->label('Mesin')
                ->options(Mesin::all()->pluck('kode_mesin', 'id'))
                ->required()
                ->searchable(),
            Select::make('hari')
                ->options([
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                    'Minggu' => 'Minggu',
                ])
                ->required(),
            DatePicker::make('tanggal'),
            TimePicker::make('jam_mulai')
                ->hoursStep(1)
                ->minutesStep(1)
                ->secondsStep(1)
                ->default('00:00:00'),
            TimePicker::make('jam_selesai')
                ->hoursStep(1)
                ->minutesStep(1)
                ->secondsStep(1)
                ->default('00:00:00'),
            TextInput::make('produk'),
            Select::make('proses')
                ->label('Proses')
                ->options(DataProses::all()->pluck('nama_proses', 'nama_proses'))
                ->searchable(),
            TextInput::make('qty')->numeric(),
            TextInput::make('unit'),
            Select::make('next_proses')
                ->label('Next Proses')
                ->options(DataProses::all()->pluck('nama_proses', 'nama_proses'))
                ->searchable(),
            DatePicker::make('next_tgl'),
            DatePicker::make('tgl_kirim'),
            Textarea::make('keterangan'),
            Select::make('pic')
                ->label('PIC')
                ->options(DataPic::all()->pluck('nama', 'nama'))
                ->required()
                ->searchable(),
            TextInput::make('produk_real'),
            Select::make('proses_real')
                ->label('Proses Real')
                ->options(DataProses::all()->pluck('nama_proses', 'nama_proses'))
                ->searchable(),
            TextInput::make('output')->numeric(),
            TextInput::make('satuan_output'),
            Textarea::make('catatan'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('mesin.kode_mesin')->label('Mesin')->sortable()->searchable(),
                TextColumn::make('tanggal'),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
                TextColumn::make('produk'),
                TextColumn::make('proses'),
                TextColumn::make('qty'),
                TextColumn::make('unit'),
            ])
            ->defaultSort('tanggal', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMesinJadwals::route('/'),
            'create' => Pages\CreateMesinJadwal::route('/create'),
            'edit' => Pages\EditMesinJadwal::route('/{record}/edit'),
        ];
    }
}
