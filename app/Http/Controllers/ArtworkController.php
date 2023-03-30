<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Author;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Sodium\add;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Application|Factory|View
    {
        $type = $request->input('type', null);
        if ($type == 'recent') {
            $atr = 'All';
            $artworks = Artwork::orderBy('date_artwork', 'DESC')->take(5)->get();
        } else if ($type == 'update') {
            $atr = 'All';
            $artworks = Artwork::orderBy('updated_at', 'DESC')->take(5)->get();
        } else {
            $atr = $request->input('atr', 'All');
            if ($atr != 'All') {
                $author = Author::find($atr);
                $artworks = $author->artworks;
            } else {
                $artworks = Artwork::all();
            }
        }
        $authors = Author::all();
        return view("artwork.index",[
            'artworks' => $artworks,
            'authors' => $authors,
            'atr' => $atr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show(Request $request, int $id): View|Factory|Application
    {
        $IsFavorite = false;
        $artwork = Artwork::find($id);
        $commentaries = $artwork->commentaries() -> orderBy('created_at', 'DESC') -> get();
        $type = $request->input('type',null);
        if(Auth::check()) {
            $user = Auth::user();
            $visitors = $artwork->visitors;
            $visitor=Visitor::find($user->id);
            if ($type == 'remove') {
                $visitor->artworks()->detach($artwork);
                return $this->index($request);
            } elseif ($type == 'add') {
                $visitor->artworks()->attach($artwork);
                return $this->index($request);
            }

            foreach ($visitors as $visitor) {
                if($user->id == $visitor->id) {
                    $IsFavorite = true;
                }
            }
        }


        return view("artwork.show",["commentaries"=>$commentaries,"artwork"=>$artwork, "IsFavorite"=>$IsFavorite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
