
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('code', 20)->nullable()->after('id');
            $table->unsignedInteger('fee')->default(0)->after('description');
            $table->date('start_date')->nullable()->after('capacity');
            $table->enum('status', ['draft', 'open', 'closed'])
                ->default('draft')->after('start_date');
        });

        // Ubah capacity menjadi quota tanpa menghapus nilainya.
        DB::statement("
            ALTER TABLE courses
            CHANGE capacity quota INT UNSIGNED NOT NULL DEFAULT 20
        ");

        // Berikan kode otomatis untuk data lama.
        DB::statement("
            UPDATE courses
            SET code = CONCAT('OLD-', id)
            WHERE code IS NULL
        ");

        // Isi tanggal mulai untuk data lama.
        DB::statement("
            UPDATE courses
            SET start_date = CURRENT_DATE
            WHERE start_date IS NULL
        ");

        // Jadikan code dan start_date wajib diisi.
        DB::statement("
            ALTER TABLE courses
            MODIFY code VARCHAR(20) NOT NULL,
            MODIFY start_date DATE NOT NULL
        ");

        Schema::table('courses', function (Blueprint $table) {
            $table->unique('code');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropUnique(['code']);
            $table->dropColumn([
                'code',
                'fee',
                'start_date',
                'status'
            ]);
        });

        DB::statement("
            ALTER TABLE courses
            CHANGE quota capacity INT UNSIGNED NOT NULL DEFAULT 20
        ");
    }
};
