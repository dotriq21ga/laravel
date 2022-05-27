<?php

namespace App\Repositories;

use App\Models\Menu;

use App\Interfaces\getIDInterface;

class MenuRepository implements getIDInterface
{
   public function getID($id)
   {
        return Menu::where('id' , $id)->get();
   }
}