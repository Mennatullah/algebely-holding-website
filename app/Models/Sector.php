<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sector extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'is_active',
        'sort',
        'link',
        'image',
    ];
    public $translatedAttributes = ['slug','title','description','content'];

    public function parent()
    {
        return $this->belongsTo(Sector::class,'parent_id');
    }
    public function childrens()
    {
        return $this->hasMany(Sector::class,'parent_id');
    }
}
