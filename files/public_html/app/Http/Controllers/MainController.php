<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
      $branches = Branch::all();

      return view('welcome', compact('branches'));
    }
}
