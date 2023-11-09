<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccessLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('user_access_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('access_level_id')->constrained();
            $table->timestamps();
        });
        DB::table('user_access_levels')->insert([
            ['user_id' => '1', 'access_level_id' => '1'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('user_access_levels');
    }
}

