<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_preference', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('annual_income');
            $table->string('occupation');
            $table->string('family_type');
            $table->string('manglik');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_preference');
    }
}
