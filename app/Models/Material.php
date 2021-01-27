<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Board;

class Material extends Model
{
    use HasFactory;
    protected $guarded = array('id');


    public function board(){
        return $this->belongsTo(Board::class);
    }
    public function getData(){
        return $this->material . $this->volume . $this->unit;
    }

}
