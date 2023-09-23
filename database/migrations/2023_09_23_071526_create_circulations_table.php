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
        Schema::create('circulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('archive_id', 100)->index('archive_numbers');
            $table->string('user_id')->index('borrower_usernames');
            $table->text('purposes')->nullable();
            $table->dateTime('borrow_dates')->index('borrow_dates');
            $table->dateTime('due_dates')->index('due_dates');
            $table->dateTime('return_dates')->nullable()->index('return_dates');
            $table->dateTime('transaction_dates');
            $table->timestamps();
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circulations');
    }
};
