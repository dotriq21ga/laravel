<?php

namespace App\Repositories;

use App\Models\Product;

use App\Interfaces\getIDInterface;

class ProductRepository implements getIDInterface
{
   public function getID($id)
   {
        return Product::where('id' , $id)->get();
   }
}