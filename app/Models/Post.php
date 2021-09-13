<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Traits\HasUuid;

class Post extends Model
{
    use HasFactory, HasUuid;
    protected $fillable = ['title'];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;
    
    
}
