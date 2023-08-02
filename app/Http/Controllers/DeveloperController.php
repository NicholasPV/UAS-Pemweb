<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function addDev(Request $request) {
        $addDev = $request->validate([
            'developer' => 'required',
            'headquarters' => 'required',
            'description' => 'required',
            'founder' => 'required',
            'locationFounded' => 'required',
            'dateFounded' => 'required'
        ]);

        $addDev['developer'] = strip_tags($addDev['developer']);
        $addDev['headquarters'] = strip_tags($addDev['headquarters']);
        $addDev['description'] = strip_tags($addDev['description']);
        $addDev['founder'] = strip_tags($addDev['founder']);
        $addDev['locationFounded'] = strip_tags($addDev['locationFounded']);
        $addDev['dateFounded'] = strip_tags($addDev['dateFounded']);
        $addDev['user_id'] = auth()->id();
        Developer::create($addDev);
        return redirect('/developer');
    }

    public function editDev(Developer $developer) {
        if (auth()->user()->id !== $developer['user_id']) {
            return redirect('/developer');
        }

        return view('editDev', ['developer' => $developer]);
    }

    public function updateDev (Developer $developer, Request $request) {
        if (auth()->user()->id !== $developer['user_id']) {
            return redirect('/developer');
        }

        $updateDev = $request->validate([
            'developer' => 'required',
            'headquarters' => 'required',
            'description' => 'required',
            'founder' => 'required',
            'locationFounded' => 'required',
            'dateFounded' => 'required'
        ]);

        $updateDev['developer'] = strip_tags($updateDev['developer']);
        $updateDev['headquarters'] = strip_tags($updateDev['headquarters']);
        $updateDev['description'] = strip_tags($updateDev['description']);
        $updateDev['founder'] = strip_tags($updateDev['founder']);
        $updateDev['locationFounded'] = strip_tags($updateDev['locationFounded']);
        $updateDev['dateFounded'] = strip_tags($updateDev['dateFounded']);

        $developer->update($updateDev);
        return redirect('/developer');
    }

    public function deleteDev(Developer $developer) {
        if (auth()->user()->id === $developer['user_id']) {
            $developer->delete();
        }
        return redirect('/developer');
    }
}
