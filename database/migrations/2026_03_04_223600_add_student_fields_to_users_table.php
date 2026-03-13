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
   Schema::table('users', function (Blueprint $table) {

    if (!Schema::hasColumn('users', 'grade')) {
        $table->string('grade')->nullable();
    }

    if (!Schema::hasColumn('users', 'group')) {
        $table->string('group')->nullable();
    }

    if (!Schema::hasColumn('users', 'rating')) {
        $table->integer('rating')->default(0);
    }

    if (!Schema::hasColumn('users', 'year')) {
        $table->string('year')->nullable();
    }

});
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
