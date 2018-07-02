<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_name'];

    public function submenu(){
        return $this->hasMany(SubMenu::class);
    }
}

