<?php namespace Groep02\Recommendations\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class create_user_recommendations_table extends Migration
{
    public function up()
    {
        Schema::create('groep02_user_recommendations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('recommendation_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('groep02_user_recommendations');
    }
}
