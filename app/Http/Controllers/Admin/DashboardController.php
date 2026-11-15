<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Cast;
use App\Models\Genre;
use App\Models\Peran;
use App\Models\Kritik;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $filmCount = Film::count();
        $castCount = Cast::count();
        $genreCount = Genre::count();
        $peranCount = Peran::count();
        $kritikCount = Kritik::count();
        $userCount = User::count();

        return view('admin.dashboard', compact(
            'filmCount',
            'castCount',
            'genreCount',
            'peranCount',
            'kritikCount',
            'userCount'
        ));
    }
}
