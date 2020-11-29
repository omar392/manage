<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function view(){
        $data['all_data'] = User::all();
        $all_data = User::all();
        return view('backend.user.view-user',$data);
    }
    public function add(){
        return view('backend.user.add-user');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email'
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('user.view');
    }
    public function edit($id){

        $edit_data = User::find($id);
        return view('backend.user.edit-user',compact('edit_data'));
    }
    public function update(Request $request,$id){

        $data =User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('user.view')->with('success','Data Updated Successfully');
    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.view');
    }
}
