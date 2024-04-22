<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $fillable = ['judul', 'deskripsi', 'file'];

    public function foto() {
        return $this->belongsTo(Foto::class);
    }

    public function komentar() {
        return $this->hasMany(Komentar::class);
    }

    public function like() {
        return $this->hasMany(Like::class);
    }
}
