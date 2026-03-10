<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class KomentarFoto extends Model
{
    protected $table = 'komentarfoto';
    protected $primaryKey = 'KomentarID';
    public $timestamps = false;

    protected $fillable = [
        'FotoID',
        'UserID',
        'IsiKomentar',
        'TanggalKomentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'UserID','UserID');
    }
}