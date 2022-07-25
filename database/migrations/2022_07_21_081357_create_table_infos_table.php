<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_infos', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('accred_level');
            $table->string('program');
            $table->smallInteger('area');
            $table->string('reportType');

            $table->smallInteger('tblRow');
            $table->smallInteger('tblCol');
            $table->string('cellText');

            // Accreditation Level Foreign Key
            $table->foreign('accred_level')
                ->references('accreditationLevel')
                ->on('accreditation_levels')
                ->onDelete('cascade');

            //Program Foreign Key
            $table->foreign('program')
                ->references('shortname')
                ->on('programs')
                ->onDelete('cascade');

            //Area Level Foreign Key
            $table->foreign('area')
                ->references('areaNumber')
                ->on('areas')
                ->onDelete('cascade');

            //Report Type Foreign Key
            $table->foreign('reportType')
                ->references('reportType')
                ->on('reports')
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(array('program','area','reportType','tblRow','tblCol'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_infos');
    }
}
