<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Package;
use Illuminate\Http\Request;

class BranchMainController extends Controller
{
    public function index($slug) {
      $branch = Branch::where('slug', $slug)->first();
      $packages = Package::where('branch_id', $branch->id)->with('features')->get();

      if(!$branch) {
        return to_route('home');
      }

      return view('branch.welcome', compact('branch', 'slug', 'packages'));
    }
}
