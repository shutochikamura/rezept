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
    public function getMaterial(){
        return $this->material;
    }

    public function getVolume(){
        return $this->volume;
    }
    public function getUnit(){
        return $this->unit;
    }
    public function getId(){
        return $this->id;
    }
    public function getBoardId(){
        return $this->board_id;
    }

}
