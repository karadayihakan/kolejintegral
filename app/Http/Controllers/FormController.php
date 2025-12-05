<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function submit(Request $request)
{
    // Verileri doğrula
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
        'commercial_info' => 'required|in:ozel,tuzel',
        'partnership_structure' => 'required|string',
        'institution_address' => 'required|string',
        'meb_compliance' => 'required|in:evet,hayir',
        'area' => 'required|string',
    ]);

    // E-posta gönder
    Mail::send('emails.form-submission', ['data' => $validated], function ($message) use ($validated) {
        $message->to('iletisim@endeneyimmerkezi.com')
                ->subject('Yeni Form Başvurusu');
    });

    return back()->with('success', 'Form başarıyla gönderildi.');
}
}
