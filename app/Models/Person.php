<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    use HasFactory;
    
    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope('age', function (Builder $builder) {
        //     $builder->where('age', '>', 20);
        // });

        static::addGlobalScope(new ScopePerson());
    }


    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    // 定義するときは、scopeをつけて、インスタンスメソッドとして定義する
    public function scopeNameEqual($query, $str)
    {
        // return $query->where('name', 'like',  "%{$str}%");
        return $query->where('name', 'like',  '%' . $str . '%');
    }

    public function scopeAgeGreaterThan($query, $n)
{
   return $query->where('age','>=', $n);
}

public function scopeAgeLessThan($query, $n)
{
   return $query->where('age', '<=', $n);
}


    
}