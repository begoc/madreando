<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagraphsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paragraphs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('article_id');
			$table->string('text');
			$table->timestamps();

			$table->foreign('article_id')
				->references('id')->on('articles')
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
		Schema::drop('paragraphs');
	}

}