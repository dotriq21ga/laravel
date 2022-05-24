<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;

use App\Models\Menu;
 
class ProfileComposer
{
    
    public function compose(View $view)
    {
        $menu = Menu::all();

        $view->with('name', $menu);

    }
}