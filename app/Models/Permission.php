<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function scopeHiddenPermissionsChosen(Builder $query, $permissionsExcept)
    {
        return $query->whereNotIn('id', $permissionsExcept)->get();
    }

    public function scopePermissionsSelected(Builder $query, $permissionChosen)
    {
        return $query->where('id', $permissionChosen)->get()->toArray();
    }
}
