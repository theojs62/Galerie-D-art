<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use App\Models\Visitor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function index(): Application|RedirectResponse|Redirector
    {
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function create(): Redirector|RedirectResponse|Application
    {
        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        if (Auth::check()) {
            $visitor = Visitor::find($id);
            $artworks = $visitor->artworks;
            $commentaries = $visitor->commentaries;
            return view('visitors.show', [
                'visitor' => $visitor,
                'artworks' => $artworks,
                'commentaries' => $commentaries,
            ]);
        }
        return view('accueil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        if (Auth::user()->id == $id) {
            $visitor = Visitor::find($id);
            $artworks = $visitor->artworks;
            $commentaries = Commentary::all();
            return view('visitors.show', [
                'visitor' => $visitor,
                'artworks' => $artworks,
                'commentaries' => $commentaries,
            ]);
        }
        return view('accueil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
