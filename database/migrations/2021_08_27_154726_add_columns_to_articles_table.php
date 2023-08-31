<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->longText('description')->nullable(); // Written by writer
            $table->unsignedSmallInteger('category_id');
            $table->unsignedSmallInteger('tag_id');
            $table->unsignedSmallInteger('client_id');
            $table->unsignedSmallInteger('writer_id')->default(0);
            $table->double('wages', 8, 2);
            $table->boolean('is_completed_by_writer')->comment('Given by writer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'description', 'category_id', 'tag_id',
                'client_id', 'writer_id', 'wages', 'is_completed_by_writer',
            ]);
        });
    }
}
