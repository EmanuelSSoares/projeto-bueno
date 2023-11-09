<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('access_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
        DB::table('access_levels')->insert([
            ['name' => 'admin'],
            ['name' => 'common'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('access_levels');
    }
}

