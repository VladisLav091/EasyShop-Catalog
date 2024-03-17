<?php


namespace App\Domain\Catalog\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalog';

    protected $fillable = [
        'name', 'description', 'parent_id', 'active'
    ];

    public function parent()
    {
        return $this->belongsTo(Catalog::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Catalog::class, 'parent_id');
    }
}
