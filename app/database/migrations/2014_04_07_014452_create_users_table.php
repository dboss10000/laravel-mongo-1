<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function($table)
         {
             // $table->engine = 'InnoDB';
             $table->increments('id');
			 $table->integer('uid');
        });

        Schema::create('networks', function($table)
        {
            $table->increments('id');

			$table->integer('un_id');
            $table->foreign('un_id')->references('id')->on('users');
			$table->string('hostname', 255);
			$table->boolean('block');
        });    

		Schema::create('hostnames', function($table)
        {
            $table->increments('id');

            $table->integer('uh_id');
            $table->foreign('uh_id')->references('id')->on('users');
			$table->int('nid', 11);
			$table->string('n_name', 100);
			$table->string('n_ip', 100);
			$table->boolean('n_status');
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::drop('users');
    Schema::drop('networks');
    Schema::drop('hostnames');
    }

}