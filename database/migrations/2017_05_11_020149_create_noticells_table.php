<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticellsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('noticells', function (Blueprint $table) {
				$table->uuid('id')->primary();
				$table->string('type');
				$table->morphs('notifiable');
				$table->text('data');
				$table->timestamp('read_at')->nullable();
				$table->timestamps();
				$table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('noticells');
	}
}
