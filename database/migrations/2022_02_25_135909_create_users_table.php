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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer("profile_picture")->default(0);
            $table->string("name");
            $table->string("username");
            $table->string("website")->default("");
            $table->string("bio")->default("");
            $table->string("email");
            $table->string("phone")->default("");
            $table->string("gender")->default("");
            $table->string("password");
            $table->boolean("feedback_emails")->default(false);
            $table->boolean("reminder_emails")->default(false);
            $table->boolean("product_emails")->default(false);
            $table->boolean("news_emails")->default(false);
            $table->boolean("private_account")->default(false);
            $table->boolean("similar_suggestion")->default(false);
            $table->string("token")->default("");
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
        Schema::dropIfExists('users');
    }
};
