<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // Specify the table name
    protected $table = 'barang';

    // If you want to allow mass assignment for specific fields, add them here
    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'stock',
        'status',
        'harga_satuan'
    ];
}
