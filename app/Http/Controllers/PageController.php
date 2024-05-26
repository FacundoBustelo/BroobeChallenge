<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Strategy;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $strategies = Strategy::all();

        return view('index', compact('categories', 'strategies'));
    }
}
