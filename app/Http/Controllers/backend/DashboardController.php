<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Contact;
use App\Item;
use App\Reservation;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slider::count();
        $reservations = Reservation::where('status', false)->get();
        $contactCount = Contact::count();
        return view('backend.dashboard', compact('categoryCount', 'itemCount', 'sliderCount', 'reservations','contactCount'));
    }
}
