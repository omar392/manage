<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Aboutus;
class AboutusController extends Controller
{
    public function view(){
        $data['count_about'] = Aboutus::count();
        $data['all_data'] = Aboutus::all();
      //  $all_data = Service::all();
        return view('backend.aboutus.view-aboutus',$data);
    }
    public function add(){
        return view('backend.aboutus.add-aboutus');
    }
    public function store(Request $request){
        $data = new Aboutus();
        $data->description = $request->description;

        $data->save();
        return redirect()->route('aboutus.view');
    }
    public function edit($id){

        $edit_data = Aboutus::find($id);
        return view('backend.aboutus.edit-aboutus',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Aboutus::find($id);
        $data->description = $request->description;
        $data->save();
        return redirect()->route('aboutus.view');
    }
    public function delete($id){
        $data = Aboutus::find($id);
        $data->delete();
        return redirect()->route('aboutus.view');
    }
}
