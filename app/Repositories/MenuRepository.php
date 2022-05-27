<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository 
{
   public function getall()
   {
       return Menu::all();
   }

   public function getid($id)
   {
       return Menu::where('id' , $id)->get();
   }
}