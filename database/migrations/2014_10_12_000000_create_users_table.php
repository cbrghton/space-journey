<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->id()->comment('User id');
            $table->string('name')->comment('Name of user');
            $table->string('email')->comment('Email of user')->unique();
            $table->timestamp('email_verified_at')
                ->comment('Timestamp of verification email')->nullable();
            $table->string('password')->comment('Password user');
            $table->timeTz('work_hours')->comment('Work hours per day ');
            $table->timeTz('start_break_time')
                ->comment('Defined start time of break time');
            $table->timeTz('end_break_time')
                ->comment('Defined end time of break time');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
