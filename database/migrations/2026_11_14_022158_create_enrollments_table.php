<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->foreignId('participant_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('status', 20)
                ->default('registered');

            $table->unique([
                'participant_id',
                'course_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropUnique(['participant_id', 'course_id']);
            $table->dropConstrainedForeignId('participant_id');
            $table->dropColumn('status');
        });
    }
};
