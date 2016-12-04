<?php namespace Indikator\User\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class RemoveFirstAndLastNames extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn(['iu_first_name', 'iu_last_name']);
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->string('iu_first_name', 100)->nullable();
            $table->string('iu_last_name', 100)->nullable();
        });
    }
}
