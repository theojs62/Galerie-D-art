<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil pour les utilisateurs non connectés.
     *
     * @return Factory|View|Application
     */
    public function homeWithoutConnection(): Factory|View|Application
    {
        return view('accueil');
    }

    /**
     * Affiche la page d'accueil pour les utilisateurs connectés.
     *
     * @return Factory|View|Application
     */
    public function homeWithConnection(): Factory|View|Application
    {
        return view('home');
    }
}
