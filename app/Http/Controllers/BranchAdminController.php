<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchAdminController extends Controller
{
    public function index($slug) {
      $branch = Branch::where('slug', $slug)->first();

      if(!$branch) {
        return to_route('home');
      }

      return view('branch.dashboard', compact('branch', 'slug'));
    }
}
