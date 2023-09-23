<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->foreignId('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('code_id')->references('id')->on('codes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('media_id')->references('id')->on('media')->onDelete('cascade')->onUpdate('cascade');
            $table->date('dates');
            $table->text('descriptions')->fulltext('descriptions');
            $table->string('notes', 100);
            $table->integer('quantities');
            $table->string('box_numbers', 10);
            $table->text('files')->nullable();
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
};
