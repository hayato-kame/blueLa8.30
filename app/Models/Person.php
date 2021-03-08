<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => [ 'required' ],
        'mail' => [ 'email' ],
        'age' => [ 'integer', 'min:0', 'max:150'],
    ];

    public static $messages = [
        'name.required' => '名前は必ず入力してください',
        'mail.email' => 'メールアドレスが必要です',
        'age.integer' => '年齢は整数を入力してください',
        'age.min' => '年齢は0以上の整数を入力してください',
        'age.max' => '年齢は150以下の整数で入力してください',
    ];


    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }
    
    // protected static function boot()
    // {
    //     parent::boot();

    //     // static::addGlobalScope('age', function (Builder $builder) {
    //     //     $builder->where('age', '>', 20);
    //     // });

    //     static::addGlobalScope(new ScopePerson());
    // }



    // // 定義するときは、scopeをつけて、インスタンスメソッドとして定義する
    // public function scopeNameEqual($query, $str)
    // {
    //     // return $query->where('name', 'like',  "%{$str}%");
    //     return $query->where('name', 'like',  '%' . $str . '%');
    // }

    // public function scopeAgeGreaterThan($query, $n)
    // {
    // return $query->where('age','>=', $n);
    // }

    // public function scopeAgeLessThan($query, $n)
    // {
    // return $query->where('age', '<=', $n);
    // }


    
}