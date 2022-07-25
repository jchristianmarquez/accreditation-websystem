<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {

            $table->id();

            $table->smallInteger('accred_level');
            $table->smallInteger('area');
            $table->string('reportType');

            // Accreditation Level Foreign Key
            $table->foreign('accred_level')
                ->references('accreditationLevel')
                ->on('accreditation_levels')
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

            $table->smallInteger('columnNumber');
            $table->string('columnName');

            $table->timestamps();

            $table->unique(array('area','reportType','columnNumber'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
