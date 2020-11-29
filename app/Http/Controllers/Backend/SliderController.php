<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Slider;
class SliderController extends Controller
{
    public function view(){
        $data['all_data'] = Slider::all();
        $all_data = Slider::all();
        return view('backend.slider.view-slider',$data);
    }
    public function add(){
        return view('backend.slider.add-slider');
    }
    public function store(Request $request){
        $data = new Slider();
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;

        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('sliders.view');
    }
    public function edit($id){

        $edit_data = Slider::find($id);
        return view('backend.slider.edit-slider',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Slider::find($id);
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;

        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/slider_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('sliders.view');
    }
    public function delete($id){
        $data = Slider::find($id);
        $data->delete();
        return redirect()->route('sliders.view');
    }
}
