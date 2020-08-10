<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("account_id")->unsigned()->index()->nullable();
            $table->foreign("account_id")->references("id")->on("accounts")->onDelete("cascade");
            $table->bigInteger("category_id")->unsigned()->index()->nullable();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->string("label")->nullable();
            $table->float("amount")->default(0);
            $table->boolean("is_in")->default(true);
            $table->tinyInteger("priority")->default(0);
            $table->json("details")->nullable();
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
        Schema::dropIfExists('entries');
    }
}
