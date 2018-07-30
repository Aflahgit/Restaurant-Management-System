<?php

namespace App\Http\Controllers\backend;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('backend.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $reserv = Reservation::find($id);
        $reserv->delete();
        return redirect()->back();
    }
}
