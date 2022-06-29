<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer("province_id");
            $table->integer("regency_id");
            $table->integer("district_id");
            $table->integer("village_id");
            $table->integer("birth_regency_id");
            $table->integer("major_id");
            $table->string("name");
            $table->string("email");
            $table->string("nim");
            $table->string("phone");
            $table->enum("gender", ["MEN", "WOMEN"]);
            $table->text("address");
            $table->date("birth_date");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
