<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use App\Models\News;
use App\Models\Magazine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
      $stats = [
          'branches_count' => Branch::count(),
          'magazines_count' => Magazine::count(),
          'latest_magazine' => Magazine::orderBy('created_at', 'desc')->first(),
          'news_count' => News::count(),
          'recent_branches' => Branch::with('user')->latest()->take(5)->get(),
          'recent_news' => News::whereNotNull('published_at')
              ->where('published_at', '<=', now())
              ->latest('published_at')
              ->take(5)
              ->get(),
      ];

      return view('admin.dashboard', compact('stats'));
    }
}
