<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Logo;
class LogoController extends Controller
{
    public function view(){
        $data['count_logo'] = Logo::count();
        $data['all_data'] = Logo::all();
        $all_data = Logo::all();
        return view('backend.logo.view-logo',$data);
    }
    public function add(){
        return view('backend.logo.add-logo');
    }
    public function store(Request $request){
        $data = new Logo();
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('logos.view');
    }
    public function edit($id){

        $edit_data = Logo::find($id);
        return view('backend.logo.edit-logo',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Logo::find($id);
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logo_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('logos.view');
    }
    public function delete($id){
        $data = Logo::find($id);
        $data->delete();
        return redirect()->route('logos.view');
    }
}
