<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('priority','asc')->get();
        return view('admin.slider.slider',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required|string',
            'image' => 'required|image',
            'text' => 'required|string'

        ]);

        $slider = new Slider();

        $rand = rand(1,999);

        $slider->title = $request->title;
        if($request->hasFile('image'))
        {
            $img_name = time().'_'.$rand.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/slider/',$img_name);
            $slider->image = $img_name;
        }
        
        $slider->text = $request->text;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        $slider->save();

        $sms = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );

        return back()->with($sms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.editSlider',compact('slider'));
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
        $slider = Slider::findOrFail($id);

        $rand = rand(1,999);

        $slider->title = $request->title;
        if($request->hasFile('image'))
        {
            unlink('images/slider/'.$slider->image);
            $img_name = time().'_'.$rand.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/slider/',$img_name);
            $slider->image = $img_name;
        }
        
        $slider->text = $request->text;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        $slider->save();

        $sms = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sliders')->with($sms);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        unlink('images/slider/'.$slider->image);
        $slider->delete();
        $sms = array(
            'message' => 'Slider deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($sms);
    }
}
