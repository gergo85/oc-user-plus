<?php namespace Indikator\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('sex', 7)->nullable();
            $table->string('job', 100)->nullable();
            $table->string('about')->nullable();
            $table->string('webpage', 200)->nullable();
            $table->string('blog', 200)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('skype', 50)->nullable();
            $table->string('icq', 8)->nullable();
            $table->string('comment')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('sex');
            $table->dropColumn('job');
            $table->dropColumn('about');
            $table->dropColumn('webpage');
            $table->dropColumn('blog');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('skype');
            $table->dropColumn('icq');
            $table->dropColumn('comment');
        });
    }
}
