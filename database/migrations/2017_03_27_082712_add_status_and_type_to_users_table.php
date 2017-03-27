<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('status')->after('password');
            $table->integer('type')->after('status');
            $table->integer('created_by')->unsigned()->nullable()->after('type');
            $table->integer('updated_by')->unsigned()->nullable()->after('created_by');
            $table->foreign('created_by', 'fk_users_created_by_users_id')->references('id')->on('users');
            $table->foreign('updated_by', 'fk_users_updated_by_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('type');
            $table->dropForeign('fk_users_created_by_users_id');
            $table->dropForeign('fk_users_updated_by_users_id');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');

        });
    }
}
