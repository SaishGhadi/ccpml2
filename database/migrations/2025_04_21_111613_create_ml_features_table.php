<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ml_features', function (Blueprint $table) {
            $table->id();
            $table->integer('jurisdictions');
            // $table->float('historical_price');
            $table->float('carbon_index');
            $table->float('dispersion');
            $table->date('upload_date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ml_features');
    }
};
