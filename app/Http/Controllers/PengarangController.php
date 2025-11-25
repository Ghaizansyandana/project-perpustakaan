<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengarang::query();
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_pengarang', 'like', "%{$search}%");
        }
        
        $data = $query->orderBy('id', 'DESC')->paginate(10);
        return view('pengarang.index', compact('data'));
    }

    public function create()
    {
        return view('pengarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengarang' => 'required|unique:pengarang,nama_pengarang'
        ]);

        Pengarang::create($request->all());
        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengarang' => 'required|unique:pengarang,nama_pengarang,' . $id
        ]);

        Pengarang::findOrFail($id)->update($request->all());
        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pengarang::findOrFail($id)->delete();
        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil dihapus');
    }
}
