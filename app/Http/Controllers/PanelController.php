<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index($slug) {
      $branch = Branch::where('slug', $slug)->first();

      if(!$branch) {
        return to_route('home');
      }

      return view('branch.panel', compact('branch', 'slug'));
    }
}
