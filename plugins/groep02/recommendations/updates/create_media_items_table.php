<?php namespace Groep02\Recommendations\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateMediaItemsTable extends Migration
{
    public function up()
    {
        Schema::create('groep02_recommendations_media_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('genre')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groep02_recommendations_media_items');
    }
}
