<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'spouse', 'child1', 'child2', 'child3', 'child4', 'child5', 'child6', 'program_id', 'program_name', 'sub_agent'];
}
