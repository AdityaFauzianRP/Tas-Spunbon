<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanMesin extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_mesin';

    protected $fillable = [
        'judul',
        'di_buat_oleh',
        'di_setujui_oleh',
        'tanggal_dokumen',
        'revisi',
        'departemen',
        'petugas_pemeliharaan',
        'penanggung_jawab',
        'tanggal_pemeliharaan',
        'catatan',
        
        'ganti_bearing_airexshaft_base',
        'ganti_bearing_guide_roll',
        'service_motor_turret',
        'service_dc_motor',
        'service_powder_brake',
        'service_pneumatic_cylinder',
        'ganti_plastic_tubing_dia_8mm',
        'service_tension_unwinder',
        'service_gear_box_turret',
        'kalibrasi_tension',
        'ganti_bearing_infeed_roll',
        'ganti_timing_v_belt',
        'grinding_nipp_roll',
        'service_dancer_roll',
        'service_tension_infeed',
        'leveling_guide_roll',
        'service_splice_breaket',
        'service_motor_infeed',
        'ganti_bearing_outfeed_roll',
        'service_rotary_joint',
        'service_tension_outfeed',
        'service_inspection_lamp_box',
        'service_motor_outfeed',
        'ganti_bearing_cooling_roll',
        'service_exhaust_fan',
        'service_motor_exhaust_fan',
        'penggantian_kabel',
        'perapihan_kabel',
        'periksa_perlengkapan_panel',
        'ganti_timing_belt_compensator_roll',
        'service_motor_compensator_roll',
        'service_motor_cooling_fan',
        'service_gear_box_side_lay',
        'service_side_lay',
        'service_motor_blower',
        'ganti_oli_gear_box_side_lay',
        'service_dudukan_doctor_blade',
        'service_valve_control_hot_oil',
    ];

    protected $guarded = [];

    protected $dates = [
        'tanggal_dokumen',
        'tanggal_pemeliharaan',
    ];

}
