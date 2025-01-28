<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToCochesTable extends Migration
{
    public function up()
    {
        Schema::table('coches', function (Blueprint $table) {
            $table->string('imagen')->nullable()->after('color');
        });
    }

    public function down()
    {
        Schema::table('coches', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
}

