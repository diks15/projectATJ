<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class halaman extends Model
{
    use HasFactory;
    protected $table = "halamen";
    protected $fillable = ['judul', 'isi'];
}
