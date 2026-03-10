<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'AlbumID';
    public $timestamps = false;

    protected $fillable = [
        'NamaAlbum',
        'Deskripsi',
        'TanggalDibuat',
        'UserID'
    ];
}