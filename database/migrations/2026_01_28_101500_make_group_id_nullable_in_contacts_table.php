<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $constraint = DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'contacts')
            ->where('COLUMN_NAME', 'group_id')
            ->whereNotNull('CONSTRAINT_NAME')
            ->where('CONSTRAINT_NAME', '!=', 'PRIMARY')
            ->value('CONSTRAINT_NAME');

        if ($constraint) {
            DB::statement("ALTER TABLE contacts DROP FOREIGN KEY `$constraint`");
        }

        DB::statement('ALTER TABLE contacts MODIFY group_id BIGINT UNSIGNED NULL');

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $constraint = DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'contacts')
            ->where('COLUMN_NAME', 'group_id')
            ->whereNotNull('CONSTRAINT_NAME')
            ->where('CONSTRAINT_NAME', '!=', 'PRIMARY')
            ->value('CONSTRAINT_NAME');

        if ($constraint) {
            DB::statement("ALTER TABLE contacts DROP FOREIGN KEY `$constraint`");
        }

        DB::statement('ALTER TABLE contacts MODIFY group_id BIGINT UNSIGNED NOT NULL');

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->cascadeOnDelete();
        });
    }
};
