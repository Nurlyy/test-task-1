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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("amount_per_usd");
            $table->timestamps();
        });

        DB::table('currencies')->insert([
            [
                'name' => 'eur',
                'amount_per_usd' => "0.91",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'rub',
                'amount_per_usd' => "80",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
