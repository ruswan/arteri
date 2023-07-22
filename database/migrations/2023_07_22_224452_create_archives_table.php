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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->string('code');
            $table->string('name');
            $table->foreignId('archive_type_id')->references('id')->on('archive_types');
            $table->text('description');
            $table->foreignId('archive_characteristic_id')->references('id')->on('archive_characteristics');
            $table->foreignId('creator_id')->references('id')->on('users');
            $table->foreignId('archive_status')->references('id')->on('archive_statuses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};