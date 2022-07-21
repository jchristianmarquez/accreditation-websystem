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
            $table->string('course');
            $table->smallInteger('area');
            $table->string('reportType');

            $table->smallInteger('approvalType')->foreign();
            $table->smallInteger('approvalDirector')->foreign();
            $table->smallInteger('approvalQA')->foreign();

            // Accreditation Level Foreign Key
            $table->foreign('accred_level')
                ->references('accreditationLevel')
                ->on('accreditation_levels')
                ->onDelete('cascade');

            //Course Foreign Key
            $table->foreign('course')
                ->references('shortname')
                ->on('department')
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
            $table->foreign('approvalType')
            ->references('approvalID')
            ->on('approval_types')
            ->onDelete('cascade');

            //Approval Director Foreign Key
            $table->foreign('approvalDirector')
                ->references('approvalStatusID')
                ->on('approval_statuses')
                ->onDelete('cascade');

            //Approval QA Foreign Key
            $table->foreign('approvalQA')
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
        Schema::dropIfExists('table_infos');
    }
}
