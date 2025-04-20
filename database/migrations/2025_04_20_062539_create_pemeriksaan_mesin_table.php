<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanMesinTable extends Migration
{
    public function up(): void
    {
        Schema::create('pemeriksaan_mesin', function (Blueprint $table) {
            $table->id();

            // === Kolom tambahan dokumen ===
            $table->string('judul');
            $table->string('di_buat_oleh');
            $table->string('di_setujui_oleh');
            $table->date('tanggal_dokumen');
            $table->string('revisi');
            $table->string('departemen');
            $table->string('petugas_pemeliharaan');
            $table->string('penanggung_jawab');
            $table->date('tanggal_pemeliharaan');
            $table->text('catatan')->nullable();

            // === Pemeriksaan boolean ===
            $table->boolean('ganti_bearing_airexshaft_base')->default(false);
            $table->boolean('ganti_bearing_guide_roll')->default(false);
            $table->boolean('service_motor_turret')->default(false);
            $table->boolean('service_dc_motor')->default(false);
            $table->boolean('service_powder_brake')->default(false);
            $table->boolean('service_pneumatic_cylinder')->default(false);
            $table->boolean('ganti_plastic_tubing_dia_8mm')->default(false);
            $table->boolean('service_tension_unwinder')->default(false);
            $table->boolean('service_gear_box_turret')->default(false);
            $table->boolean('kalibrasi_tension')->default(false);
            $table->boolean('ganti_bearing_infeed_roll')->default(false);
            $table->boolean('ganti_timing_v_belt')->default(false);
            $table->boolean('grinding_nipp_roll')->default(false);
            $table->boolean('service_dancer_roll')->default(false);
            $table->boolean('service_tension_infeed')->default(false);
            $table->boolean('leveling_guide_roll')->default(false);
            $table->boolean('service_splice_breaket')->default(false);
            $table->boolean('service_motor_infeed')->default(false);
            $table->boolean('ganti_bearing_outfeed_roll')->default(false);
            $table->boolean('service_rotary_joint')->default(false);
            $table->boolean('service_tension_outfeed')->default(false);
            $table->boolean('service_inspection_lamp_box')->default(false);
            $table->boolean('service_motor_outfeed')->default(false);
            $table->boolean('ganti_bearing_cooling_roll')->default(false);
            $table->boolean('service_exhaust_fan')->default(false);
            $table->boolean('service_motor_exhaust_fan')->default(false);
            $table->boolean('penggantian_kabel')->default(false);
            $table->boolean('perapihan_kabel')->default(false);
            $table->boolean('periksa_perlengkapan_panel')->default(false);
            $table->boolean('ganti_timing_belt_compensator_roll')->default(false);
            $table->boolean('service_motor_compensator_roll')->default(false);
            $table->boolean('service_motor_cooling_fan')->default(false);
            $table->boolean('service_gear_box_side_lay')->default(false);
            $table->boolean('service_side_lay')->default(false);
            $table->boolean('service_motor_blower')->default(false);
            $table->boolean('ganti_oli_gear_box_side_lay')->default(false);
            $table->boolean('service_dudukan_doctor_blade')->default(false);
            $table->boolean('service_valve_control_hot_oil')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_mesin');
    }
}
