<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('user')->latest()->get();

        return Inertia::render('Berita/Index', [
            'berita' => $berita,
        ]);
    }

    /**
     * Tampilkan form tambah berita.
     */
    public function create()
    {
        return Inertia::render('Berita/Create');
    }

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Hapus berita.
     */
    public function destroy(Berita $beritum)
    {
        $beritum->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
