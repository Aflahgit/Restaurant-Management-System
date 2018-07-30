<?php

namespace App\Http\Controllers\backend;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tittle'=>'required',
            'sub_tittle'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->tittle);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate .'-'. uniqid() .'-'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider', 0777, true);
            }

            $image->move('uploads/slider', $imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $slider = new Slider();
        $slider->tittle = $request->tittle;
        $slider->sub_tittle = $request->sub_tittle;
        $slider->image = $imagename;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tittle'=>'required',
            'sub_tittle'=>'required',
            'image'=>'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->tittle);

        $slider = Slider::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate .'-'. uniqid() .'-'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider', 0777, true);
            }

            $image->move('uploads/slider', $imagename);
        }
        else{
            $imagename = $slider->image;
        }

        $slider->tittle = $request->tittle;
        $slider->sub_tittle = $request->sub_tittle;
        $slider->image = $imagename;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (file_exists('uploads/slider'.$slider->name))
        {
            unlink('uploads/slider/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Slider Successfully Deleted');
    }
}
