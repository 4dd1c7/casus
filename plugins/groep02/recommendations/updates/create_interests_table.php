<?php namespace Groep02\Recommendations\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class create_interests_table extends Migration
{
    public function up()
    {
        Schema::create('groep02_user_interests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->string('type')->nullable();
            $table->string('genre')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groep02_user_interests');
    }
}
