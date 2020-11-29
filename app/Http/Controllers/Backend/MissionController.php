<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Mission;
class MissionController extends Controller
{
    
    public function view(){
        $data['count_mission'] = Mission::count();
        $data['all_data'] = Mission::all();
        $all_data = Mission::all();
        return view('backend.mission.view-mission',$data);
    }
    public function add(){
        return view('backend.mission.add-mission');
    }
    public function store(Request $request){
        $data = new Mission();
        $data->title = $request->title;

        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('missions.view');
    }
    public function edit($id){

        $edit_data = Mission::find($id);
        return view('backend.mission.edit-mission',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Mission::find($id);
        $data->title = $request->title;

        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/mission_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('missions.view');
    }
    public function delete($id){
        $data = Mission::find($id);
        $data->delete();
        return redirect()->route('missions.view');
    }
}
