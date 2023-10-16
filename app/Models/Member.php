<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $fillable = ['name', 'email'];

    public function school() : HasManyThrough
    {
        return $this->hasManyThrough(School::class);
    }
}
