<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("account_id")->unsigned()->index();
            $table->foreign("account_id")->references("id")->on("accounts")->onDelete("cascade");
            $table->morphs('accountable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountables');
    }
}
