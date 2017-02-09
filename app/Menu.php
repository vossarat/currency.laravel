<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'url',
        'icon',
        'published',
        'weight',
        'position',
        //'parent',
    ];

    public function getMenuById($id){
        return $this->id($id)->get();
    }

    public function getMenuIdByTitle($title){
        return $this->title($title)->first()->id;
    }

    public function ScopeTitle($query, $title){
        $query->where('title','=', $title);
    }

    public function ScopeId($query, $id){
        $query->where('id','=', $id);
    }
    
    public function parentRecord(){
        return $this->hasOne('App\Menu', 'id', 'parent_id');
    }

}
