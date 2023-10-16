<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberSchool extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'school_id'];

    protected $table = 'member_school';
}
