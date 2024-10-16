<?php
namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
class ActionController extends Controller{
    public function index(){
        $items    = Item::getMenuList();
        $subItems = Item::getSubMenuList();
        return view('home', compact('items', 'subItems'));
    }
}
