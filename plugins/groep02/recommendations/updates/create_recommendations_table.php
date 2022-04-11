<?php namespace Groep02\Recommendations\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateRecommendationsTable extends Migration
{
    public function up()
    {
        Schema::create('groep02_recommendations_recommendations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groep02_recommendations_recommendations');
    }
}
