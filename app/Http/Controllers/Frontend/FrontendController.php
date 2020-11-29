<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\Mission;
use App\Model\Vision;
use App\Model\NewsEvent;
use App\Model\Service;
use App\Model\Aboutus;
use App\Model\Communicate;
use Illuminate\Support\Facades\Mail;
class FrontendController extends Controller
{
    public function index(){
        $data['logo'] = Logo::first();
        $data['sliders'] = Slider::all();
        $data['contacts'] = Contact::first();
        $data['missions'] = Mission::first();
        $data['visions'] = Vision::first();
        $data['news_events'] = NewsEvent::orderBy('id','desc')->get();
        $data['services'] = Service::all();
        return view('frontend.layouts.home',$data);
    }


    public function aboutus(){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['about'] = Aboutus::first();

        return view('frontend.singlepages.aboutus',$data);
    }
    public function contactus(){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        return view('frontend.singlepages.contactus',$data);
    }
    public function newsdetails($id){
        $data['logo'] = Logo::first();
        $data['news'] = NewsEvent::find($id);
        $data['contacts'] = Contact::first();
        return view('frontend.singlepages.news-event-details',$data);
    }
    public function mission(){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['missions'] = Mission::first();

        return view('frontend.singlepages.mission',$data);
    }
    public function vision(){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['visions'] = Vision::first();

        return view('frontend.singlepages.vision',$data);
    }
    public function newsevents(){
        $data['logo'] = Logo::first();
        $data['contacts'] = Contact::first();
        $data['news_events'] = NewsEvent::orderBy('id','desc')->get();

        return view('frontend.singlepages.news',$data);
    }
    public function store(Request $request){
     
        $contact  = new Communicate();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile_no = $request->mobile_no;
        $contact->address = $request->address;
        $contact->msg = $request->msg;
        $contact->save();
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'msg' => $request->msg,
        );
        Mail::send('frontend.email.contact',$data,function($message) use($data){
            $message->from('omarabosamaha@gmail.com','omar ashraf');
            $message->to($data['email']);
            $message->subject(' Thanks');
        });
        return redirect()->back()->with('success','MSG Sent Successfully');
    }

}
