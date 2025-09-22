<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['summary', 'detailed', 'custom']);
            $table->text('details')->nullable(); // Make nullable to match your form
            $table->enum('status', ['completed', 'pending'])->default('pending');
            $table->date('date')->nullable(); // Allow NULL for date
            $table->time('time')->nullable(); // Allow NULL for time
            $table->string('file')->nullable();

            $table->boolean('notify')->default(false);
            $table->boolean('email')->default(false);
            $table->boolean('sms')->default(false);
            $table->boolean('push')->default(false);
            $table->boolean('webhook')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};