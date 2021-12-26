<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Post;

class CreateCommentsTable extends Migration
{
   
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('text');
            
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Post::class);
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
