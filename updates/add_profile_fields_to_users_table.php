<?php namespace Indikator\User\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('iu_first_name', 100)->nullable();
            $table->string('iu_last_name', 100)->nullable();
            $table->string('iu_gender', 7)->nullable();
            $table->string('iu_job', 100)->nullable();
            $table->string('iu_about')->nullable();
            $table->string('iu_webpage', 200)->nullable();
            $table->string('iu_blog', 200)->nullable();
            $table->string('iu_facebook', 100)->nullable();
            $table->string('iu_twitter', 100)->nullable();
            $table->string('iu_skype', 50)->nullable();
            $table->string('iu_icq', 8)->nullable();
            $table->string('iu_comment')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('iu_gender');
            $table->dropColumn('iu_job');
            $table->dropColumn('iu_about');
            $table->dropColumn('iu_webpage');
            $table->dropColumn('iu_blog');
            $table->dropColumn('iu_facebook');
            $table->dropColumn('iu_twitter');
            $table->dropColumn('iu_skype');
            $table->dropColumn('iu_icq');
            $table->dropColumn('iu_comment');
        });
    }
}
