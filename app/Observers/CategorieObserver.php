<?php

namespace App\Observers;

use App\Models\Categorie;

class CategorieObserver
{
    /**
     * Handle the Categorie "created" event.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return void
     */
    public function created(Categorie $categorie)
    {
        
    }

    /**
     * Handle the Categorie "updated" event.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return void
     */
    public function updated(Categorie $categorie)
    {
        dd("Je vérifie avant d'inserer");
    }

    /**
     * Handle the Categorie "deleted" event.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return void
     */
    public function deleted(Categorie $categorie)
    {
        //
    }

    /**
     * Handle the Categorie "restored" event.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return void
     */
    public function restored(Categorie $categorie)
    {
        //
    }

    /**
     * Handle the Categorie "force deleted" event.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return void
     */
    public function forceDeleted(Categorie $categorie)
    {
        //
    }
}
