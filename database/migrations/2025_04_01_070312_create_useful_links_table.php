<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsefulLinksTable extends Migration
{
    public function up()
    {
        Schema::create('useful_links', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Link title
            $table->string('hin_title'); // Hindi title
            $table->string('url'); // Link URL
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('useful_links');
    }
}