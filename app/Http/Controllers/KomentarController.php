<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarFoto;

class KomentarController extends Controller
{
    public function tambah(Request $request)
    {
        $request->validate([
            'fotoid' => 'required',
            'komentar' => 'required'
        ]);

        KomentarFoto::create([
            'FotoID' => $request->fotoid,
            'UserID' => session('userid'),   // pastikan session ini ada
            'IsiKomentar' => $request->komentar,
            'TanggalKomentar' => date('Y-m-d')
        ]);

        return redirect()->back();
    }

    public function hapus($id)
    {
        KomentarFoto::destroy($id);

        return redirect()->back();
    }
}