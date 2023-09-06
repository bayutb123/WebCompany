<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('ALTER TABLE blogs CHANGE COLUMN tag category VARCHAR(255)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE blogs CHANGE COLUMN category tag VARCHAR(255)');
    }
};
