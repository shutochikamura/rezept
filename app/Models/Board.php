<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Board extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public function materials(){
        return $this->hasMany(Material::class, 'board_id');
    }
public function user(){
    return $this->belongsTo(User::class);
}
public function getData(){
    return $this->user->id;
}

}
