<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Vision;
class VisionController extends Controller
{
    public function view(){
        $data['count_data'] = Vision::count();
        $data['all_data'] = Vision::all();
        $all_data = Vision::all();
        return view('backend.vision.view-vision',$data);
    }
    public function add(){
        return view('backend.vision.add-vision');
    }
    public function store(Request $request){
        $data = new Vision();
        $data->title = $request->title;

        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('visions.view');
    }
    public function edit($id){

        $edit_data = Vision::find($id);
        return view('backend.vision.edit-vision',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Vision::find($id);
        $data->title = $request->title;

        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/vision_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('visions.view');
    }
    public function delete($id){
        $data = Vision::find($id);
        $data->delete();
        return redirect()->route('visions.view');
    }
}
