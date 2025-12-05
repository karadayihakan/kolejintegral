<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            if (auth()->user()->role === 'user') {
              return to_route('branch.dashboard.index', ['slug' => auth()->user()->branch->slug]);
            } else if (auth()->user()->role === 'admin') {
              return redirect()->intended(route('dashboard.index'));
            } else if (auth()->user()->role === 'branch_admin') {
              return to_route('branch.dashboard.index', ['slug' => auth()->user()->branch->slug]);
            }
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
