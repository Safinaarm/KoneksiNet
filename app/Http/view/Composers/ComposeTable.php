<?php

namespace App\Http\View\Composers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\View\View;

class ComposeTable
{
    protected $data_menu;
    protected $data_user;

    public function __construct()
    {
        $this->data_menu = Menu::all();
        $this->data_user = User::all();

    }

    public function compose(View $view)
    {
        $view->with('menus', $this->data_menu);
        $view->with('all_user', $this->data_user);
    }
}