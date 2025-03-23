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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->date('date');
            $table->string('attendance');
            $table->time('dropoff_time');
            $table->string('sleepwell');
            $table->string('takebath');
            $table->string('brushteeth');
            $table->string('healthcondition');
            $table->time('pickup_time')->nullable();
            $table->datetime('last_updated_at')->nullable();
            $table->boolean('pickup_time_updated')->default(false);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
