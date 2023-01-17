<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Programs extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'program_id', 'flag'];

    public function flagUrl() {
        // return $this->flag;
        return $this->flag ? Storage::disk('flags')->url($this->flag) : null;
    }

}
