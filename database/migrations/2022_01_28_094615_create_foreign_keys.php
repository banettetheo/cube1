<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Favoris', function(Blueprint $table) {
			$table->foreign('Utilisateur_id')->references('id')->on('Utilisateur')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Favoris', function(Blueprint $table) {
			$table->foreign('IdRessources')->references('id')->on('Ressources')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->foreign('IdUser1')->references('id')->on('Utilisateur')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->foreign('IdUser2')->references('id')->on('Utilisateur')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->foreign('IdTypeRelation')->references('id')->on('Type_relation')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Commentaire', function(Blueprint $table) {
			$table->foreign('IdUser')->references('id')->on('Utilisateur')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Commentaire', function(Blueprint $table) {
			$table->foreign('IdRessources')->references('id')->on('Ressources')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Ressources', function(Blueprint $table) {
			$table->foreign('IdCategorie')->references('id')->on('Categorie')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Ressources', function(Blueprint $table) {
			$table->foreign('IdType')->references('id')->on('Type')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('Favoris', function(Blueprint $table) {
			$table->dropForeign('Favoris_Utilisateur_id_foreign');
		});
		Schema::table('Favoris', function(Blueprint $table) {
			$table->dropForeign('Favoris_IdRessources_foreign');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->dropForeign('Relation_IdUser1_foreign');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->dropForeign('Relation_IdUser2_foreign');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->dropForeign('Relation_IdTypeRelation_foreign');
		});
		Schema::table('Commentaire', function(Blueprint $table) {
			$table->dropForeign('Commentaire_IdUser_foreign');
		});
		Schema::table('Commentaire', function(Blueprint $table) {
			$table->dropForeign('Commentaire_IdRessources_foreign');
		});
		Schema::table('Ressources', function(Blueprint $table) {
			$table->dropForeign('Ressources_IdCategorie_foreign');
		});
		Schema::table('Ressources', function(Blueprint $table) {
			$table->dropForeign('Ressources_IdType_foreign');
		});
	}
}