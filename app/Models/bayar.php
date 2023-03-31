<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayar extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'jurusan', 'telp', 'tagihan'];
    protected $table = 'bayar';
    public $timestamps = false;
}
