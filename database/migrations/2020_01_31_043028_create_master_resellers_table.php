<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_resellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('assign');
            $table->integer('count_accounts');
            $table->integer('limit_reseller');
            $table->integer('limit_pin');

            $table->softDeletes();
            $table->dateTime('restored_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('restored_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('master_resellers');
    }
}
