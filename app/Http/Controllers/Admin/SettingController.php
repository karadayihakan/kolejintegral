<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $contact = Setting::getByGroup('contact');
        $social = Setting::getByGroup('social');
        $map = Setting::getByGroup('map');

        return view('admin.settings.index', compact('contact', 'social', 'map'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            // İletişim
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'address_left' => ['nullable', 'string'],
            'address_right' => ['nullable', 'string'],
            'left_contact_title' => ['nullable', 'string', 'max:255'],
            'right_contact_title' => ['nullable', 'string', 'max:255'],
            'left_phone' => ['nullable', 'string', 'max:255'],
            'left_email' => ['nullable', 'email', 'max:255'],
            'right_phone' => ['nullable', 'string', 'max:255'],
            'right_email' => ['nullable', 'email', 'max:255'],

            // Sosyal medya
            'instagram' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],

            // Harita
            'left_embed_url' => ['nullable', 'string'],
            'right_embed_url' => ['nullable', 'string'],
        ]);

        // İletişim
        Setting::set('phone', $data['phone'] ?? '', 'phone', 'contact');
        Setting::set('email', $data['email'] ?? '', 'email', 'contact');
        Setting::set('address_left', $data['address_left'] ?? '', 'text', 'contact');
        Setting::set('address_right', $data['address_right'] ?? '', 'text', 'contact');
        Setting::set('left_contact_title', $data['left_contact_title'] ?? '', 'text', 'contact');
        Setting::set('right_contact_title', $data['right_contact_title'] ?? '', 'text', 'contact');
        Setting::set('left_phone', $data['left_phone'] ?? '', 'phone', 'contact');
        Setting::set('left_email', $data['left_email'] ?? '', 'email', 'contact');
        Setting::set('right_phone', $data['right_phone'] ?? '', 'phone', 'contact');
        Setting::set('right_email', $data['right_email'] ?? '', 'email', 'contact');

        // Sosyal
        Setting::set('instagram', $data['instagram'] ?? '', 'url', 'social');
        Setting::set('facebook', $data['facebook'] ?? '', 'url', 'social');
        Setting::set('twitter', $data['twitter'] ?? '', 'url', 'social');
        Setting::set('youtube', $data['youtube'] ?? '', 'url', 'social');
        Setting::set('linkedin', $data['linkedin'] ?? '', 'url', 'social');

        // Harita (kullanıcı ne girdiyse aynen sakla – sadece URL bekliyoruz)
        Setting::set('left_embed_url', $data['left_embed_url'] ?? '', 'url', 'map');
        Setting::set('right_embed_url', $data['right_embed_url'] ?? '', 'url', 'map');

        return redirect()->route('dashboard.settings.index')
            ->with('status', 'Ayarlar başarıyla güncellendi.');
    }
}
