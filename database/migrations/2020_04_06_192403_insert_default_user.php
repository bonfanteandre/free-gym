<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@freegym.com',
            'password' => Hash::make('freegym')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->delete(1);
    }
}
