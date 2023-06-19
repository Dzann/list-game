<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = game::all();
        $menuGames = 'active';
        return view('games.index_game', compact('menuGames', 'games'));
    }

    public function home()
    {
        $games = game::all();
        return view('welcome', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuGames = 'active';
        return view('games.form_game', compact('menuGames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'genre' => 'required',
                'foto' => 'required|image|mimes:jpeg,png|max:2048',
                
            ]);
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/photos', $fileName);

            game::create([
                'title' => $request->title,
                'description' => $request->description,
                'genre' => $request->genre,
                'foto' => $path
            ]);

            return redirect()->back()->with(['success' => true, 'message' => 'Game berhasil disimpan']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'ada kesalahan system!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menuGames = 'active';
        $edit = game::find($id);
        return view('games.form_edit_game', compact('edit', 'menuGames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('public/photos', $fileName);
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'genre' => 'required',
                'foto' => 'required|image|mimes:jpeg,png|max:2048',

            ]);

            $game = game::find($id);

            $game->title = $request->title;
            $game->description = $request->description;
            $game->genre = $request->genre;
            if ($request->foto != "") {
                $game->foto = $path;
            }

            $game->update();

            return redirect()->route('games.index')->with(['Success' => 'Game berhasil diupdate']);
        } catch (Exception $e) {
            return redirect()->route('games.index')->with(['failed' => 'Game gagal diupdate. error:', $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = game::find($id);

        if ($game) {
            $game->delete();
            return redirect()->back()->with(['Succes' => 'Game berhasil dihapus!!']);
        } else {
            return redirect()->back()->with(['failed' => 'Game tidak ditemukan!!']);
        }
    }
}
