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
        Schema::create('rentcars', function (Blueprint $table) {
            $table->increments('id');
            $table->text('key')->nullable();
            $table->string('author')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('car_id')->nullable();
            $table->string('event')->nullable();
            $table->longText('destination')->nullable();
            $table->text('start_time')->nullable();
            $table->text('finish_time')->nullable();
            $table->enum('status', ['accept', 'queue', 'decline'])->default('queue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentcars');
    }
};
