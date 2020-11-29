<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(){
        $id = Auth::user()->id;
        $user = User::find($id);
//dd($user);
        return view('backend.user.view-profile',compact('user'));
    }
    public function edit(){
        $id = Auth::user()->id;
        $edit_data = User::find($id);
        return view('backend.user.edit-profile',compact('edit_data'));

    }
    public function update(Request $request){
        $data =User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('profiles.view')->with('success','Data Updated Successfully');
    }
    public function passwordview(){
        return view('backend.user.edit-password');
    }
    public function passwordupdate(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view');
        }else{
            return redirect()->back();
        }
        //return view('backend.user.edit-password');
    }
}
