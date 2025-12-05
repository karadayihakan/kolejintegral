<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index($slug)
    {
        return view('branch.admin.package.index', compact('slug'));
    }

    public function getData($slug)
    {
        $branch = Branch::where('slug', $slug)->first();
        $packages = Package::where('branch_id', $branch->id)->with('features')->get();

        return datatables()->of($packages)
            ->addColumn('actions', function ($package) {
                return '<button data-id="'.$package->id.'" class="btn btn-sm btn-warning editPackage">Düzenle</button>
                        <button data-id="'.$package->id.'" class="btn btn-sm btn-danger deletePackage">Sil</button>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $branch = Branch::where('user_id', auth()->user()->id)->first();

        // Package update/create
        $package = Package::updateOrCreate(
            ['id' => $request->package_id],
            ['name' => $request->name, 'branch_id' => $branch->id],
        );

        // Package Features update/create
        if ($request->has('features')) {
            PackageFeature::where('package_id', $package->id)->delete();
            foreach ($request->features as $feature) {
                PackageFeature::updateOrCreate(
                    ['id' => $feature['id'] ?? null],
                    ['name' => $feature['name'], 'package_id' => $package->id]
                );
            }
        }

        return response()->json(['success' => 'Paket başarıyla kaydedildi!']);
    }

    public function edit($slug, $id)
    {
        // İlgili paketi bul
        $package = Package::with('features')->findOrFail($id);
        return response()->json($package);
    }

    public function destroy($slug, $id)
    {
        Package::findOrFail($id)->delete();
        return response()->json(['success' => 'Paket başarıyla silindi!']);
    }

    public function deleteFeature($slug, $id)
    {
        PackageFeature::findOrFail($id)->delete();
        return response()->json(['success' => 'Özellik başarıyla silindi!']);
    }
}
