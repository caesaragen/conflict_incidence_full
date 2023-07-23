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
        Schema::create(
            'conflict_incidents', function (Blueprint $table) {
                $table->id();
                $table->string('conservation_area');
                $table->string('station');
                $table->string('outpost');
                $table->date('reporting_date_from');
                $table->date('reporting_date_to');
                $table->unsignedInteger('serial_number')->nullable();
                $table->date('incident_date');
                $table->string('incident_type');
                $table->string('affected_area');
                $table->string('gps_area');
                $table->string('location');
                $table->string('animal_responsible');
                $table->string('action_taken');
                $table->string('kws_ob_number')->nullable();
                $table->string('x_coordinate')->nullable();
                $table->string('y_coordinate')->nullable();
                $table->timestamps();

                 // Foreign key for the user who created the report
                $table->foreignId('user_id')->constrained('users');

                // Foreign key for the area warden who verified the report
                $table->foreignId('verified_by')->nullable()->constrained('users');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conflict_incidents');
    }
};
