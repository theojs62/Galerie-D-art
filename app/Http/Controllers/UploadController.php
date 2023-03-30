<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Visitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Upload l'image pour une oeuvre.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function uploadArtwork(Request $request, $id): RedirectResponse
    {
        $artwork = Artwork::findOrFail($id);
        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            return redirect()->route('artworks.show', [$artwork->id]);
        }
        $name = 'image';
        $now = time();
        $name = sprintf("%s_%d.%s", $name, $now, $file->extension());

        $file->storeAs('images/artwork', $name);
        if (isset($artwork->link_artwork)) {
            Storage::delete($artwork->link_artwork);
        }
        $artwork->link_artwork = 'images/artwork/' . $name;
        $artwork->save();
        return redirect()->route('artworks.show', [$artwork->id]);
    }

    /**
     * Upload l'image pour l'avatar d'un visiteur.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function uploadVisitor(Request $request, $id): RedirectResponse
    {
        $visitor = Visitor::findOrFail($id);
        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            return redirect()->route('home');
        }
        $name = 'image';
        $now = time();
        $name = sprintf("%s_%d.%s", $name, $now, $file->extension());

        $file->storeAs('images/visitor', $name);
        if (isset($visitor->link_avatar)) {
            Storage::delete($visitor->link_avatar);
        }
        $visitor->link_artwork = 'images/visitor/' . $name;
        $visitor->save();
        return redirect()->route('home');
    }
}
