<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;

class GalleryController extends Controller
{

    public function index()
    {
        $foto = Foto::all();
        return view('gallery.index',compact('foto'));
    }

    public function create()
    {
        return view('gallery.upload');
    }

    public function store(Request $request)
    {

        $file = $request->file('foto');
        $namaFile = time().".".$file->extension();

        $file->move(public_path('uploads'),$namaFile);

        Foto::create([
            'JudulFoto'=>$request->judul,
            'DeskripsiFoto'=>$request->deskripsi,
            'LokasiFile'=>$namaFile,
            'UserID'=>session('userid')
        ]);

        return redirect('/gallery');
    }

    public function edit($id)
    {
        $foto = Foto::find($id);
        return view('gallery.edit',compact('foto'));
    }

    public function update(Request $request,$id)
    {

        Foto::where('FotoID',$id)->update([
            'JudulFoto'=>$request->judul,
            'DeskripsiFoto'=>$request->deskripsi
        ]);

        return redirect('/gallery');
    }

    public function destroy($id)
    {
        Foto::where('FotoID',$id)->delete();
        return back();
    }

}