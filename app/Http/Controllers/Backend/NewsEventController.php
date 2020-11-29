<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\NewsEvent;
class NewsEventController extends Controller
{
    public function view(){
       // $data['count_data'] = Vision::count();
        $data['all_data'] = NewsEvent::all();
        $all_data = NewsEvent::all();
        return view('backend.news.view-news',$data);
    }
    public function add(){
        return view('backend.news.add-news');
    }
    public function store(Request $request){
        $data = new NewsEvent();
        $data->date =date('y-m-d',strtotime($request->date));
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news_events'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('news_events.view');
    }
    public function edit($id){

        $edit_data = NewsEvent::find($id);
        return view('backend.news.edit-news',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $data =NewsEvent::find($id);
        $data->date =date('y-m-d',strtotime($request->date));
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/news_events/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news_events'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('news_events.view');
    }
    public function delete($id){
        $data = NewsEvent::find($id);
        $data->delete();
        return redirect()->route('news_events.view');
    }
}
