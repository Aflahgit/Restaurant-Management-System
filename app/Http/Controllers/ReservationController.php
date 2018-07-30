<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserv(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'datetimepicker' => 'required',
            'message' => 'required'
        ]);

        $reserv = new Reservation();
        $reserv->name = $request->name;
        $reserv->phone = $request->phone;
        $reserv->email = $request->email;
        $reserv->date_and_time = $request->datetimepicker;
        $reserv->message = $request->message;
        $reserv->status = false;
        $reserv->save();

        Toastr::success('Reservation request sent successfully, we will confirm to you shortly', 'Success');
        return redirect()->back();
    }
}
