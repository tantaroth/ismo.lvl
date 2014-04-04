<?php

// app/database/migrations/2014_03_27_130348_create_status.php

use Illuminate\Database\Migrations\Migration;

class CreateStatuses extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function($table)
        {
            $table->increments('id');
            $table->string('name', 30)->nullable();
            $table->string('description', 100);
            $table->boolean('status')->default(true);
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statuses', function($tabla)
        {
            $tabla->dropColumn('updated_at', 'created_at');
        });
    }

}