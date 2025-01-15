<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    // Nama tabel (opsional)
    protected $table = 'reviews';

    // Kolom yang dapat diisi
    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
        'comment',
        'created_at',
        'updated_at',
    ];

    // Relasi ke tabel Books
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    // Relasi ke tabel Users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}