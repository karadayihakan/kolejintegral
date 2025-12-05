<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class RegisterPdfController extends Controller
{
    public function index()
    {
        return view('admin.register-pdfs.index');
    }

    public function getPdfs()
    {
        $pdfs = RegisterPdf::orderBy('order')->get();
        return DataTables::of($pdfs)
            ->addColumn('pdf_link', function($row){
                $url = $row->pdf_path;
                if (str_starts_with($url, 'storage/')) {
                    $url = asset($url);
                } elseif (!str_starts_with($url, 'http') && !str_starts_with($url, '/')) {
                    $url = asset('storage/' . $url);
                }
                return '<a href="' . $url . '" target="_blank" class="btn btn-sm btn-info">Görüntüle</a>';
            })
            ->addColumn('status', function($row){
                return $row->is_active 
                    ? '<span class="badge bg-success">Aktif</span>' 
                    : '<span class="badge bg-secondary">Pasif</span>';
            })
            ->addColumn('action', function($row){
                $editBtn = '<button class="btn btn-sm btn-primary edit me-2" data-id="'.$row->id.'" title="Düzenle" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>';
                $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'" data-title="'.$row->title.'" title="Sil" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['pdf_link', 'status', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf|max:10240',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('register-pdfs', 'public');
        }

        $pdf = RegisterPdf::updateOrCreate(
            ['id' => $request->pdf_id],
            [
                'title' => $request->title,
                'pdf_path' => $pdfPath ?? ($request->pdf_id ? RegisterPdf::find($request->pdf_id)->pdf_path : null),
                'order' => $request->order ?? 0,
                'is_active' => $request->boolean('is_active'),
            ]
        );

        return response()->json(['success' => 'PDF başarıyla kaydedildi!']);
    }

    public function edit($id)
    {
        $pdf = RegisterPdf::findOrFail($id);
        return response()->json($pdf);
    }

    public function destroy($id)
    {
        $pdf = RegisterPdf::findOrFail($id);
        
        if ($pdf->pdf_path) {
            Storage::disk('public')->delete($pdf->pdf_path);
        }
        
        $pdf->delete();

        return response()->json(['success' => 'PDF başarıyla silindi!']);
    }
}
