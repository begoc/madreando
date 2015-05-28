<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->unsignedInteger('section_id');
			$table->unsignedInteger('created_by');
			$table->tinyInteger('published');
			$table->timestamp('published_at');
			$table->unsignedInteger('viewed');
			$table->timestamps();

			$table->foreign('section_id')
				->references('id')->on('sections')
				->onDelete('cascade');

			$table->foreign('created_by')
				->references('id')->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
