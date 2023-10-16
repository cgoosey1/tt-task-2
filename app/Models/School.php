<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class School extends Model
{
    use HasFactory;

    protected $table = 'school';
    protected $fillable = ['name'];

    /**
     * Get all Members associated to this school
     *
     * @return HasMany
     */
    public function members() : HasManyThrough
    {
        return $this->hasManyThrough(
            Member::class,
            MemberSchool::class,
            'school_id',
            'id',
            null,
            'member_id'
        );
    }
}
