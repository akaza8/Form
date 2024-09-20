<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dish_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('menu_id')->unsigned();
            $table->enum('type', ['veg','non-veg'])->default('veg');
        });
        DB::table('dish_type')->insert([
            ['menu_id' => 1, 'type' => 'veg', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 2, 'type' => 'non-veg', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 3, 'type' => 'veg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_type');
    }
};
