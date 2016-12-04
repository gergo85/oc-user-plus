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
            $table->dropColumn([
                'iu_first_name', 'iu_last_name', 'iu_gender', 'iu_job', 'iu_about', 'iu_webpage', 'iu_blog',
                'iu_facebook', 'iu_twitter', 'iu_skype', 'iu_icq', 'iu_comment'
            ]);
        });
    }
}
