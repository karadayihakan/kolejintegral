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
            ->addColumn('action', function($row){
                $editBtn = '<button class="btn btn-primary btn-sm edit" data-id="'.$row->id.'">Edit</button>';
                $deleteBtn = '<button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:branches,slug,' . $request->branch_id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->user_id,
            'password' => 'nullable|string|min:6|confirmed',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'background' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

          // Handle logo upload
          if ($request->hasFile('logo')) {
              $logoPath = $request->file('logo')->store('logos', 'public');
          } else {
              $logoPath = null;
          }

          // Handle background upload
          if ($request->hasFile('background')) {
              $backgroundPath = $request->file('background')->store('backgrounds', 'public');
          } else {
              $backgroundPath = null;
          }

          // User update/create
          $user = User::updateOrCreate(
              ['id' => $request->user_id],
              [
                  'email' => $request->email,
                  'password' => $request->password ? Hash::make($request->password) : User::find($request->user_id)->password,
              ]
          );

          // Branch update/create
          Branch::updateOrCreate(
              ['id' => $request->branch_id],
              [
                  'name' => $request->name,
                  'logo' => $logoPath,
                  'address' => $request->address,
                  'background' => $backgroundPath,
                  'slug' => $request->slug,
                  'phone' => $request->phone,
                  'user_id' => $user->id,
              ]
          );

        return response()->json(['success' => 'Şube başarıyla kaydedildi!']);
    }

    public function edit($id)
    {
        $branch = Branch::with('user')->find($id);
        return response()->json($branch);
    }

    public function destroy($id)
    {
        Branch::find($id)->delete();
        return response()->json(['success' => 'Şube başarıyla silindi!']);
    }
}
