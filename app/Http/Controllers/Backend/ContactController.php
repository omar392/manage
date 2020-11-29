<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Contact;
class ContactController extends Controller
{
    
    public function view(){
        $data['count_contact'] = Contact::count();
        $data['all_data'] = Contact::all();
      //  $all_data = Service::all();
        return view('backend.contacts.view-contacts',$data);
    }
    public function add(){
        return view('backend.contacts.add-contacts');
    }
    public function store(Request $request){
        $data = new Contact();
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->youtupe = $request->youtupe;
        $data->google_plus = $request->google_plus;

        $data->save();
        return redirect()->route('contacts.view');
    }
    public function edit($id){

        $edit_data = Contact::find($id);
        return view('backend.contacts.edit-contacts',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =Contact::find($id);
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->youtupe = $request->youtupe;
        $data->google_plus = $request->google_plus;


        $data->save();
        return redirect()->route('contacts.view');
    }
    public function delete($id){
        $data = Contact::find($id);
        $data->delete();
        return redirect()->route('contacts.view');
    }
}
