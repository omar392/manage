@extends('frontend.layouts.master')
@section('content')
<section class="banner_part">
    <img src="{{asset('frontend/image/banner.jpg')}}" style="width: 100%">
</section>

<!-- About us Section -->
<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid #000000; width: 70%;">News and Events </h3>
            </div>
        </div>
        <div class="row">
            <div class="row">
				<div class="col-md-12">
					<img src="{{asset('upload/news_events/'.$news->image)}}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px; width: 400px;hight: 450px;">
                    <p>Date : {{date('d-m-Y',strtotime($news->date))}}</p>
                    <p>Title : {{$news->short_title}}</p>
                    <p style="text-align: justify;"><br>{{$news->long_title}}</p>
				</div>
        </div>
    </div>
</section>
@endsection