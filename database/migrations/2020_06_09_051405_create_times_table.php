<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('times', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestampTz('start_activity')
                ->comment('Real start timestamp of activity');
            $table->timestampTz('end_activity')
                ->comment('Real end timestamp of activity')
                ->nullable();
            $table->timestampTz('start_break')
                ->comment('Real start timestamp of break time')
                ->nullable();
            $table->timestampTz('end_break')
                ->comment('Real end timestamp of break time')
                ->nullable();
            $table->timeTz('total_hours')
                ->comment('Total hours of activity day')
                ->nullable();
            $table->timestampsTz();
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
        Schema::dropIfExists('times');
    }
}
