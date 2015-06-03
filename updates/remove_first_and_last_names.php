<?php namespace Indikator\User\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class RemoveFirstAndLastNames extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('iu_first_name');
            $table->dropColumn('iu_last_name');
        });
    }

    public function down()
    {
        // Nothing
    }
}
