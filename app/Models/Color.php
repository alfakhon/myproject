<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
