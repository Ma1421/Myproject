<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower_user', function (Blueprint $table) {
            /**
     * Run the migrations.
     *
     * @return void
     */
     
            $table->unsignedInteger('user_id'); // 追加
            $table->unsignedInteger('follower_id'); // 追加
            // $table->timestamps(); 削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follower_user');
    }
};
