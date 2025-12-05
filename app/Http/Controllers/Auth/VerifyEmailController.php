<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            if (auth()->user()->role === 'user') {
              return to_route('branch.dashboard.index', ['slug' => auth()->user()->branch->slug]);
            } else if (auth()->user()->role === 'admin') {
              return redirect()->intended(route('dashboard.index'));
            } else if (auth()->user()->role === 'branch_admin') {
              return to_route('branch.dashboard.index', ['slug' => auth()->user()->branch->slug]);
            }

            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if (auth()->user()->role === 'user') {
          return to_route('branch.dashboard.index', ['slug' => auth()->user()->branch->slug]);
        } else if (auth()->user()->role === 'admin') {
          return redirect()->intended(route('dashboard.index'));
        } else if (auth()->user()->role === 'branch_admin') {
          return to_route('branch.dashboard.index', ['slug' => auth()->user()->branch->slug]);
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
