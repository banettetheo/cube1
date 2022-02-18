<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Favoris', function(Blueprint $table) {
			$table->foreign('Utilisateur_id')->references('id')->on('Utilisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Favoris', function(Blueprint $table) {
			$table->foreign('IdRessources')->references('id')->on('Ressources')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Favoris', function(Blueprint $table) {
			$table->foreign('Type_favoris_id')->references('id')->on('type_favoris')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->foreign('IdUser1')->references('id')->on('Utilisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->foreign('IdUser2')->references('id')->on('Utilisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Relation', function(Blueprint $table) {
			$table->foreign('IdTypeRelation')->references('id')->on('Type_relation')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Commentaire', function(Blueprint $table) {
			$table->foreign('IdUser')->references('id')->on('Utilisateurs')
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
			$table->foreign('IdType')->references('id')->on('type_ressource')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Ressources', function(Blueprint $table) {
			$table->foreign('IdEtat')->references('id')->on('etat')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Ressources', function(Blueprint $table) {
			$table->foreign('IdUtilisateur_createur')->references('id')->on('Utilisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Jointure_Ress_Utilisateur', function(Blueprint $table) {
			$table->foreign('IdUtilisateur')->references('id')->on('Utilisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Jointure_Ress_Utilisateur', function(Blueprint $table) {
			$table->foreign('IdRessource')->references('id')->on('Ressources')
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
		Schema::table('Favoris', function(Blueprint $table) {
			$table->dropForeign('Favoris_Type_favoris_id_foreign');
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
		Schema::table('Jointure_Ress_Utilisateur', function(Blueprint $table) {
			$table->dropForeign('Jointure_Ress_Utilisateur_IdUtilisateur_foreign');
		});
		Schema::table('Jointure_Ress_Utilisateur', function(Blueprint $table) {
			$table->dropForeign('Jointure_Ress_Utilisateur_IdRessource_foreign');
		});
	}
}