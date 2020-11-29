<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Service;
class ServicesController extends Controller
{
    public function view(){
        $data['all_data'] = Service::all();
      //  $all_data = Service::all();
        return view('backend.services.view-services',$data);
    }
    public function add(){
        return view('backend.services.add-services');
    }
    public function store(Request $request){
        $data = new Service();
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;

        $data->save();
        return redirect()->route('services.view');
    }
    public function edit($id){

        $edit_data = Service::find($id);
        return view('backend.services.edit-services',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Service::find($id);
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;

        $data->updated_by = Auth::user()->id;
       
        $data->save();
        return redirect()->route('services.view');
    }
    public function delete($id){
        $data = Service::find($id);
        $data->delete();
        return redirect()->route('services.view');
    }
}
