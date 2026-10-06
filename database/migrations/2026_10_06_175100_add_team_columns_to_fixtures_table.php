<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->foreignId('team1_id')->nullable()->after('title')->constrained('teams')->nullOnDelete();
            $table->foreignId('team2_id')->nullable()->after('team1_id')->constrained('teams')->nullOnDelete();
            $table->time('time')->nullable()->after('date');
        });
    }

    public function down(): void
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropConstrainedForeignId('team1_id');
            $table->dropConstrainedForeignId('team2_id');
        });
    }
};
