<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('participations', function (Blueprint $table) {
            $table->enum('typeRole', ['principal', 'secondaire'])
                  ->after('role');
        });
    }


  public function down(): void
    {
        Schema::table('participations', function (Blueprint $table) {
            $table->dropColumn('typeRole');
        });
    }
};