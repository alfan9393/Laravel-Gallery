<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KomentarFoto;
use App\Models\LikeFoto;
use App\Models\User;

class Foto extends Model
{
    protected $table = 'foto';
    protected $primaryKey = 'FotoID';
    public $timestamps = false;

    protected $fillable = [
        'JudulFoto',
        'DeskripsiFoto',
        'TanggalUnggah',
        'LokasiFile',
        'AlbumID',
        'UserID'
    ];

    // relasi komentar
    public function komentar()
    {
        return $this->hasMany(KomentarFoto::class,'FotoID','FotoID');
    }

    // relasi like
    public function like()
    {
        return $this->hasMany(LikeFoto::class,'FotoID','FotoID');
    }

    // relasi user yang upload foto
    public function user()
    {
        return $this->belongsTo(User::class,'UserID','UserID');
    }
}