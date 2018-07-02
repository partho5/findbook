<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    public $fillable = ['menu_id', 'submenu_name'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
