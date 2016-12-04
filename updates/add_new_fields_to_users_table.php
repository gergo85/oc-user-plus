<?php namespace Indikator\User\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class AddNewFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('iu_telephone', 100)->nullable();
            $table->string('iu_company', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn(['iu_telephone', 'iu_company']);
        });
    }
}
