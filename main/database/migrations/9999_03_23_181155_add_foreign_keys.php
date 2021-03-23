<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('projects',function(Blueprint $table){
           $table -> foreign('user_id' , 'user-projects')
            ->references('id')
            ->on('users');
       });
       Schema::table('pictures' , function(Blueprint $table){
           $table -> foreign('project_id' , 'project-pictures')
            ->references('id')
            ->on('projects');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pictures' , function (Blueprint $table){
            $table -> dropForeign('project-pictures');
        });

        Schema::table('projects' , function (Blueprint $table){
            $table -> dropForeign('user-projects');
        });
    }
}
