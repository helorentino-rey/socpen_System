<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(5); // Adjust the number as needed
        return view('your-view-name', compact('items'));
    }
}