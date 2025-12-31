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
        Schema::create('url_storages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('original_url');
            $table->string('shortened_url')->unique();
            $table->integer('click_count')->default(0);
            $table->string('user_id')->nullable();
            $table->boolean('is_temporary')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_storages');
    }
};
