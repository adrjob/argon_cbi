<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_id',
        'type',
        'href',
        'client_id',
        'doc_id'        
    ];

    public function documents()
    {
        return $this->belongsTo(Documents::class, 'doc_id', 'id');
    }
}
