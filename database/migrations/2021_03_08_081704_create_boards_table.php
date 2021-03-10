<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');  // 関連するのが１つなら、単数形で
            $table->string('title');
            $table->string('message');
            $table->timestamps();
            // 外部キー制約必要
            // $table->foreign('person_id')->references('id')->on('people');
            // こうすると、参照元を消したときに、関連するこのテーブルのデータも一緒に消えます
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
