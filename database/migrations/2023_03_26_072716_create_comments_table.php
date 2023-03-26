<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('comments', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('post_id');
			$table->foreignId('user_id')->constrained()->cascadeOnDelete();
			$table->text('body');
			$table->timestamps();

			// Constraint

			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

			// or you can combine unsignedbigInt("post_id") and constraint like this

			// $table->foreignId('post_id')->constrained()->cascadeOnDelete() // see user Id example
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('comments');
	}
};
