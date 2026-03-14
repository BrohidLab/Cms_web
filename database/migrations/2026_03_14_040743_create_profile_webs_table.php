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
        Schema::create('profile_webs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
                        $table->text('description_short')->nullable();
                        $table->longText('about')->nullable();
            
                        $table->string('no_wa')->nullable();
                        $table->string('email')->nullable();
            
                        $table->longText('google_maps')->nullable();
            
                        $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_webs');
    }
};
