<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->time('Heure_Entree')->nullable();
            $table->time('Heure_Sortie')->nullable();
            $table->foreignId('employee_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->dropColumn('Heure_Entree');
            $table->dropColumn('Heure_Sortie');
            $table->dropConstrainedForeignId('employee_id');
        });
    }
};
