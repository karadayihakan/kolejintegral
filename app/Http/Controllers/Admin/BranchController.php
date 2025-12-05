<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    public function index()
    {
        return view('admin.branch.index');
    }

    public function getBranches()
    {
        $branches = Branch::with('user')->get();
        return DataTables::of($branches)
            ->addColumn('hero_image_preview', function($row){
                $defaultImages = [
                    'okul-oncesi' => 'images/okul-oncesi-hero.jpg',
                    'ilkokul' => 'images/ilkokul-hero.jpg',
                    'ortaokul' => 'images/ortaokul-hero.jpg',
                    'anadolu-lisesi' => 'images/fen-anadolu-lisesi-hero.jpg',
                    'fen-lisesi' => 'images/fen-anadolu-lisesi-hero.jpg',
                ];
                
                if ($row->hero_image) {
                    $path = str_starts_with($row->hero_image, 'http') 
                        ? $row->hero_image 
                        : (str_starts_with($row->hero_image, 'storage/') 
                            ? asset($row->hero_image) 
                            : (str_starts_with($row->hero_image, 'images/') 
                                ? asset($row->hero_image) 
                                : asset('storage/' . $row->hero_image)));
                } else {
                    // Varsayılan görseli kullan
                    $defaultImage = $defaultImages[$row->type] ?? 'images/okul-oncesi-hero.jpg';
                    $path = asset($defaultImage);
                }
                
                return '<img src="' . $path . '" alt="Hero" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">';
            })
            ->addColumn('action', function($row){
                $editBtn = '<button class="btn btn-sm btn-primary edit me-2" data-id="'.$row->id.'" title="Düzenle" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>';
                $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'" data-name="'.$row->name.'" title="Sil" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['hero_image_preview', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:branches,slug,' . ($request->branch_id ?? 'NULL'),
            'email' => 'required|string|email|max:255|unique:users,email,' . ($request->user_id ?? 'NULL'),
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'background' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'description' => 'nullable|string',
            'slogan' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
        ];

        $validated = $request->validate($rules);

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } elseif ($request->branch_id) {
            // Mevcut logoyu koru
            $existingBranch = Branch::find($request->branch_id);
            $logoPath = $existingBranch ? $existingBranch->logo : null;
        }

        // Handle background upload
        $backgroundPath = null;
        if ($request->hasFile('background')) {
            $backgroundPath = $request->file('background')->store('backgrounds', 'public');
        } elseif ($request->branch_id) {
            // Mevcut background'u koru
            $existingBranch = Branch::find($request->branch_id);
            $backgroundPath = $existingBranch ? $existingBranch->background : null;
        }

        // Handle hero_image upload
        $heroImagePath = null;
        if ($request->hasFile('hero_image')) {
            $heroImagePath = $request->file('hero_image')->store('heroes', 'public');
        } elseif ($request->branch_id) {
            // Mevcut hero_image'ı koru
            $existingBranch = Branch::find($request->branch_id);
            $heroImagePath = $existingBranch ? $existingBranch->hero_image : null;
        }

        // User update/create
        $userData = [
            'email' => $request->email,
            'name' => $request->name,
            'role' => 'branch_admin',
        ];

        // Phone alanını yönet
        if ($request->user_id) {
            // Mevcut kullanıcı varsa telefon numarasını koru veya güncelle
            $existingUser = User::find($request->user_id);
            if ($existingUser) {
                $userData['phone'] = $request->phone ?? $existingUser->phone;
            } else {
                $userData['phone'] = $request->phone ?? '';
            }
        } else {
            // Yeni kullanıcı için telefon numarası zorunlu
            $userData['phone'] = $request->phone ?? '';
        }

        // Password yönetimi - sadece mevcut kullanıcı varsa şifresini koru
        if ($request->user_id) {
            $existingUser = User::find($request->user_id);
            if ($existingUser && $existingUser->password) {
                // Mevcut şifreyi koru
                $userData['password'] = $existingUser->password;
            } else {
                // Şifre yoksa rastgele bir şifre oluştur (users tablosu için zorunlu)
                $userData['password'] = Hash::make(uniqid('branch_', true));
            }
        } else {
            // Yeni kullanıcı için rastgele şifre oluştur (users tablosu için zorunlu)
            $userData['password'] = Hash::make(uniqid('branch_', true));
        }

        $user = User::updateOrCreate(
            ['id' => $request->user_id],
            $userData
        );

        // Branch update/create
        $branchData = [
            'name' => $request->name,
            'description' => $request->description,
            'slogan' => $request->slogan,
            'address' => $request->address,
            'slug' => $request->slug,
            'phone' => $request->phone,
            'user_id' => $user->id,
        ];

        if ($logoPath) {
            $branchData['logo'] = $logoPath;
        }

        if ($backgroundPath) {
            $branchData['background'] = $backgroundPath;
        }

        if ($heroImagePath) {
            $branchData['hero_image'] = $heroImagePath;
        }

        Branch::updateOrCreate(
            ['id' => $request->branch_id],
            $branchData
        );

        return response()->json(['success' => 'Birim başarıyla kaydedildi!']);
    }

    public function edit($id)
    {
        $branch = Branch::with('user')->find($id);
        return response()->json($branch);
    }

    public function destroy($id)
    {
        $branch = Branch::with('user')->find($id);
        
        if (!$branch) {
            return response()->json(['error' => 'Şube bulunamadı!'], 404);
        }

        // İlişkili kullanıcıyı da sil
        if ($branch->user) {
            $branch->user->delete();
        }

        $branch->delete();
        
        return response()->json(['success' => 'Şube başarıyla silindi!']);
    }
}
