<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishes', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('accred_level');
            $table->string('program');
            $table->smallInteger('area');
            $table->string('reportType');
            $table->smallInteger('tblRow');
            $table->string('comment');
            $table->string('edited_by');

            // $table->smallInteger('approvalType')->foreign();
            $table->smallInteger('approval')->foreign();

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

            //Approval Type Foreign Key
            // $table->foreign('approvalType')
            // ->references('approvalID')
            // ->on('approval_types')
            // ->onDelete('cascade');

            //Approval Any
            $table->foreign('approval')
                ->references('approvalStatusID')
                ->on('approval_statuses')
                ->onDelete('cascade');

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
        Schema::dropIfExists('publishes');
    }
}
