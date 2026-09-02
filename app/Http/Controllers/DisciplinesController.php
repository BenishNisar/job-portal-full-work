<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DisciplinesController extends Controller
{
public function index()
    {
 
  return view('Home.disciplines.index');
    }



    public function show($slug)
    {
        $discipline = DB::table('disciplines')->where('slug', $slug)->first();

        if (!$discipline) {
            abort(404);
        }

        return view('Home.disciplines.show', compact('discipline'));
    }
}