<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    public function index()
    {
        $magazines = Magazine::orderBy('created_at', 'desc')->get();
        $settings = \App\Models\Setting::getByGroup('contact') ?? [];
        $socialSettings = \App\Models\Setting::getByGroup('social') ?? [];
        
        return view('magazines.index', compact('magazines', 'settings', 'socialSettings'));
    }
}
