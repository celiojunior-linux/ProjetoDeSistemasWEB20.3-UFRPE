<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_list', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("title");
            $table->text("desc");
            $table->string("deadline");
            $table->integer("state")->default(0);
            $table->integer("user_id");
            $table->timestamp("created_at")->default(DB::raw('current_timestamp'));
            $table->timestamp("updated_at")->default(DB::raw('current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_list');
    }
}
