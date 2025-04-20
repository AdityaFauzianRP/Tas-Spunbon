<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemeriksaanMesinResource\Pages;
use App\Filament\Resources\PemeriksaanMesinResource\RelationManagers;
use App\Models\PemeriksaanMesin;
use App\Models\DataPic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemeriksaanMesinResource extends Resource
{
    protected static ?string $model = PemeriksaanMesin::class;

    protected static ?string $navigationLabel = 'Pemeriksaan Mesin';

    protected static ?string $label = 'Pemeriksaan Mesin';
    protected static ?string $pluralLabel = 'Pemeriksaan Mesin';

    protected static ?string $navigationGroup = 'Pemeriksaan Mesin & Perawatan';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Dokumen')
                    ->schema([
                        Forms\Components\TextInput::make('judul'),
                        Forms\Components\Select::make('di_buat_oleh')
                            ->label('Dibuat Oleh')
                            ->options(DataPic::all()->pluck('nama', 'nama'))
                            ->required()
                            ->searchable(),
                        Forms\Components\Select::make('di_setujui_oleh')
                            ->label('Disetujui Oleh')
                            ->options(DataPic::all()->pluck('nama', 'nama'))
                            ->required()
                            ->searchable(),
                        Forms\Components\DatePicker::make('tanggal_dokumen'),
                        Forms\Components\TextInput::make('revisi'),
                        Forms\Components\TextInput::make('departemen'),
                        Forms\Components\Select::make('petugas_pemeliharaan')
                            ->options(DataPic::all()->pluck('nama', 'nama'))
                            ->required()
                            ->searchable(),
                        Forms\Components\Select::make('penanggung_jawab')
                            ->options(DataPic::all()->pluck('nama', 'nama'))
                            ->required()
                            ->searchable(),
                        Forms\Components\DatePicker::make('tanggal_pemeliharaan'),
                        Forms\Components\Textarea::make('catatan'),
                    ]),
                Forms\Components\Toggle::make('ganti_bearing_airexshaft_base'),
                Forms\Components\Toggle::make('ganti_bearing_guide_roll'),
                Forms\Components\Toggle::make('service_motor_turret'),
                Forms\Components\Toggle::make('service_dc_motor'),
                Forms\Components\Toggle::make('service_powder_brake'),
                Forms\Components\Toggle::make('service_pneumatic_cylinder'),
                Forms\Components\Toggle::make('ganti_plastic_tubing_dia_8mm'),
                Forms\Components\Toggle::make('service_tension_unwinder'),
                Forms\Components\Toggle::make('service_gear_box_turret'),
                Forms\Components\Toggle::make('kalibrasi_tension'),
                Forms\Components\Toggle::make('ganti_bearing_infeed_roll'),
                Forms\Components\Toggle::make('ganti_timing_v_belt'),
                Forms\Components\Toggle::make('grinding_nipp_roll'),
                Forms\Components\Toggle::make('service_dancer_roll'),
                Forms\Components\Toggle::make('service_tension_infeed'),
                Forms\Components\Toggle::make('leveling_guide_roll'),
                Forms\Components\Toggle::make('service_splice_breaket'),
                Forms\Components\Toggle::make('service_motor_infeed'),
                Forms\Components\Toggle::make('ganti_bearing_outfeed_roll'),
                Forms\Components\Toggle::make('service_rotary_joint'),
                Forms\Components\Toggle::make('service_tension_outfeed'),
                Forms\Components\Toggle::make('service_inspection_lamp_box'),
                Forms\Components\Toggle::make('service_motor_outfeed'),
                Forms\Components\Toggle::make('ganti_bearing_cooling_roll'),
                Forms\Components\Toggle::make('service_exhaust_fan'),
                Forms\Components\Toggle::make('service_motor_exhaust_fan'),
                Forms\Components\Toggle::make('penggantian_kabel'),
                Forms\Components\Toggle::make('perapihan_kabel'),
                Forms\Components\Toggle::make('periksa_perlengkapan_panel'),
                Forms\Components\Toggle::make('ganti_timing_belt_compensator_roll'),
                Forms\Components\Toggle::make('service_motor_compensator_roll'),
                Forms\Components\Toggle::make('service_motor_cooling_fan'),
                Forms\Components\Toggle::make('service_gear_box_side_lay'),
                Forms\Components\Toggle::make('service_side_lay'),
                Forms\Components\Toggle::make('service_motor_blower'),
                Forms\Components\Toggle::make('ganti_oli_gear_box_side_lay'),
                Forms\Components\Toggle::make('service_dudukan_doctor_blade'),
                Forms\Components\Toggle::make('service_valve_control_hot_oil'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('revisi'),
                Tables\Columns\TextColumn::make('departemen'),
                Tables\Columns\TextColumn::make('petugas_pemeliharaan'),
                Tables\Columns\TextColumn::make('penanggung_jawab'),
                Tables\Columns\TextColumn::make('tanggal_pemeliharaan'),
                Tables\Columns\TextColumn::make('catatan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPemeriksaanMesins::route('/'),
            'create' => Pages\CreatePemeriksaanMesin::route('/create'),
            'edit' => Pages\EditPemeriksaanMesin::route('/{record}/edit'),
        ];
    }
}
