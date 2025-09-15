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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // original file name
            $table->string('file_name')->nullable();        // stored file name (UUID or hashed)
            $table->string('mime_type')->nullable();        // e.g. image/png
            $table->string('extension')->nullable();        // e.g. png, pdf
            $table->string('disk')->default('public');      // Laravel disk: public, s3, etc.
            $table->string('directory')->nullable();        // path/folder structure
            $table->unsignedBigInteger('size')->nullable(); // in bytes
            $table->integer('status')->default(1);          // 1: active, 0: inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
