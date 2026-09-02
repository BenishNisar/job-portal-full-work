<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NeedHelpController extends Controller
{
    //
      public function index()
    {
        return view('Dashboard.admin.need_help.index');
    }
}
