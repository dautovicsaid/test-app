<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function carModels()
    {

        return $this->hasMany(CarModel::class);
    }

    public function scopeSearch($query, $request) : Builder
    {
        return $query->when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
