<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->boolean('gender')->after('name');
            $table->text('permanent_address')->after('present_address');
            $table->string('education')->after('designation');
            $table->string('adhaar_number');
            $table->string('pan_number');
            $table->string('blood_group');
            $table->string('body_mark');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('account_number');
            $table->string('ifsc_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('permanent_address');
            $table->dropColumn('education');
            $table->dropColumn('adhaar_number');
            $table->dropColumn('pan_number');
            $table->dropColumn('blood_group');
            $table->dropColumn('body_mark');
            $table->dropColumn('bank_name');
            $table->dropColumn('branch_name');
            $table->dropColumn('account_number');
            $table->dropColumn('ifsc_code');

        });
    }
}
