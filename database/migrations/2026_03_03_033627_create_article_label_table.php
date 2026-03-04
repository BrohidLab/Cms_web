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
        Schema::create('article_label', function (Blueprint $table) {
            $table->uuid('article_id');
                    $table->uuid('content_label_id');
            
                    $table->foreign('article_id')
                          ->references('id')
                          ->on('articles')
                          ->onDelete('cascade');
            
                    $table->foreign('content_label_id')
                          ->references('id')
                          ->on('content_labels')
                          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_label');
    }
};
