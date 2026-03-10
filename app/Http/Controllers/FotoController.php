<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;

class FotoController extends Controller
{

    public function index()
    {
        // mengambil foto + komentar + user komentar
        $foto = Foto::with(['komentar.user'])->orderBy('FotoID','desc')->get();

        return view('gallery.index', compact('foto'));
    }

    public function uploadForm()
    {
        $album = Album::all();
        return view('gallery.upload', compact('album'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'required|image'
        ]);

        $file = $request->file('foto');
        $namaFile = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('foto'), $namaFile);

        Foto::create([
            'JudulFoto' => $request->judul,
            'DeskripsiFoto' => $request->deskripsi,
            'TanggalUnggah' => date('Y-m-d'),
            'LokasiFile' => $namaFile,
            'AlbumID' => $request->albumid,
            'UserID' => session('userid')
        ]);

        return redirect('/')->with('success','Foto berhasil diupload');
    }

    public function formEdit($id)
    {
        $foto = Foto::findOrFail($id);
        return view('gallery.edit', compact('foto'));
    }

    public function edit(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);

        $data = [
            'JudulFoto' => $request->judul,
            'DeskripsiFoto' => $request->deskripsi
        ];

        if($request->hasFile('foto')){

            $file = $request->file('foto');
            $namaFile = time().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('foto'), $namaFile);

            $data['LokasiFile'] = $namaFile;
        }

        $foto->update($data);

        return redirect('/')->with('success','Foto berhasil diupdate');
    }

    public function hapus($id)
    {
        Foto::destroy($id);
        return redirect('/')->with('success','Foto berhasil dihapus');
    }

}