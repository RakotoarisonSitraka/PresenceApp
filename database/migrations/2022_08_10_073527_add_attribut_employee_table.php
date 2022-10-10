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
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->string('Addresse')->nullable();
            $table->string('CIN')->nullable()->after('Profil');
            $table->integer('Age')->nullable()->after('Profil');
            // $table->string('Section')->nullable()->after('Profil');
            // $table->string('Position')->nullable()->after('Profil');
            $table->string('Sexe')->nullable()->after('Profil');
            $table->string('Ville')->nullable()->after('Profil');
            // $table->string('Matricule')->nullable()->after('Profil');
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
            $table->dropColumn('Addresse');
            $table->dropColumn('CIN');
            $table->dropColumn('Age');
            // $table->dropColumn('Section');
            // $table->dropColumn('Position');
            $table->dropColumn('Sexe');
            $table->dropColumn('Ville');
            // $table->dropColumn('Matricule');
        });
    }
};
