<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gtr_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('generation');
            $table->integer('year_start');
            $table->integer('year_end')->nullable();
            $table->string('engine');
            $table->string('displacement');
            $table->integer('horsepower');
            $table->string('torque');
            $table->string('transmission');
            $table->string('drivetrain');
            $table->string('acceleration')->nullable();
            $table->string('top_speed')->nullable();
            $table->string('fuel_type')->default('Gasoline');
            $table->string('weight')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('is_nismo')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gtr_models');
    }
};
