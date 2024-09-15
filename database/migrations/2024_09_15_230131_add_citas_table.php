<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('citas')->insert([
            [
                'mascota' => 'Scabbers',
                'fecha' => '2024-09-20',
                'hora' => '10:30',
                'motivo' => 'Chequeo general',
                'veterinario' => 'Dr. Pérez',
                'observaciones' => 'Buen estado de salud',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mascota' => 'Hedwig',
                'fecha' => '2024-09-22',
                'hora' => '09:00',
                'motivo' => 'Vacunación',
                'veterinario' => 'Dr. Gómez',
                'observaciones' => 'Paciente tranquilo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
    public function down()
    {
        DB::table('citas')->whereIn('mascota', ['Scabbers', 'Hedwig'])->delete();
    }
    
};
