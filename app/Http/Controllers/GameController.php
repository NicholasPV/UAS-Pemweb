<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function addGame(Request $request) {
        $addGame = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'platform' => 'required',
            'developer' => 'required',
            'publisher' => 'required',
            'dateReleased' => 'required'
        ]);

        $addGame['title'] = strip_tags($addGame['title']);
        $addGame['genre'] = strip_tags($addGame['genre']);
        $addGame['platform'] = strip_tags($addGame['platform']);
        $addGame['developer'] = strip_tags($addGame['developer']);
        $addGame['publisher'] = strip_tags($addGame['publisher']);
        $addGame['dateReleased'] = strip_tags($addGame['dateReleased']);
        $addGame['user_id'] = auth()->id();
        Game::create($addGame);
        return redirect('/game');
    }

    public function editGame(Game $game) {
        if (auth()->user()->id !== $game['user_id']) {
            return redirect('/game');
        }

        return view('editGame', ['game' => $game]);
    }

    public function updateGame (Game $game, Request $request) {
        if (auth()->user()->id !== $game['user_id']) {
            return redirect('/game');
        }

        $updateGame = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'platform' => 'required',
            'developer' => 'required',
            'publisher' => 'required',
            'dateReleased' => 'required',
        ]);

        $updateGame['title'] = strip_tags($updateGame['title']);
        $updateGame['genre'] = strip_tags($updateGame['genre']);
        $updateGame['platform'] = strip_tags($updateGame['platform']);
        $updateGame['developer'] = strip_tags($updateGame['developer']);
        $updateGame['publisher'] = strip_tags($updateGame['publisher']);
        $updateGame['dateReleased'] = strip_tags($updateGame['dateReleased']);

        $game->update($updateGame);
        return redirect('/game');
    }

    public function deleteGame(Game $game) {
        if (auth()->user()->id === $game['user_id']) {
            $game->delete();
        }
        return redirect('/game');
    }
}
