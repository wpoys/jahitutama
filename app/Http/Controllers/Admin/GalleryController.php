<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Constructor - require admin login
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show all gallery images
     */
    public function index(): View
    {
        $galleries = Gallery::with('user')->latest()->paginate(12);
        $categories = Gallery::categories();

        return view('admin.galleries.index', [
            'galleries' => $galleries,
            'categories' => $categories,
        ]);
    }

    /**
     * Show upload form
     */
    public function create(): View
    {
        $categories = Gallery::categories();
        return view('admin.galleries.create', ['categories' => $categories]);
    }

    /**
     * Store new gallery image
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:jas,kebaya,seragam,gamis,permak,umum',
            'gambar_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'gambar_file.required' => 'Gambar harus diunggah',
            'gambar_file.image' => 'File harus berupa gambar',
            'gambar_file.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        try {
            // Upload gambar
            $file = $request->file('gambar_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('galleries', $filename, 'public');

            // Simpan ke database
            Gallery::create([
                'judul' => $validated['judul'],
                'deskripsi' => $validated['deskripsi'],
                'kategori' => $validated['kategori'],
                'gambar_file' => $filename,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('admin.galleries.index')
                ->with('success', 'Gambar berhasil diunggah!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
        }
    }

    /**
     * Show gallery details
     */
    public function show($id): View
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Gallery::categories();

        return view('admin.galleries.show', [
            'gallery' => $gallery,
            'categories' => $categories,
        ]);
    }

    /**
     * Show edit form
     */
    public function edit($id): View
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Gallery::categories();

        return view('admin.galleries.edit', [
            'gallery' => $gallery,
            'categories' => $categories,
        ]);
    }

    /**
     * Update gallery image
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:jas,kebaya,seragam,gamis,permak,umum',
            'gambar_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);

        try {
            // Jika ada upload gambar baru
            if ($request->hasFile('gambar_file')) {
                // Hapus gambar lama
                if ($gallery->gambar_file) {
                    Storage::disk('public')->delete('galleries/' . $gallery->gambar_file);
                }

                // Upload gambar baru
                $file = $request->file('gambar_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('galleries', $filename, 'public');
                $validated['gambar_file'] = $filename;
            }

            $gallery->update($validated);

            return redirect()->route('admin.galleries.show', $gallery)
                ->with('success', 'Gambar berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui gambar: ' . $e->getMessage());
        }
    }

    /**
     * Delete gallery image
     */
    public function destroy($id): RedirectResponse
    {
        $gallery = Gallery::findOrFail($id);

        try {
            // Hapus file gambar
            if ($gallery->gambar_file) {
                Storage::disk('public')->delete('galleries/' . $gallery->gambar_file);
            }

            $gallery->delete();

            return redirect()->route('admin.galleries.index')
                ->with('success', 'Gambar berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus gambar: ' . $e->getMessage());
        }
    }
}
