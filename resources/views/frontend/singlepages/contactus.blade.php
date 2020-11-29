@extends('frontend.layouts.master')
@section('content')

<section class="banner_part">
    <img src="{{asset('frontend/image/banner.jpg')}}" style="width: 100%">
</section>

<!-- About us Section -->
<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid black;width: 39%;">Send us a Message</h3>

                @if (Session::get('success'))
               <div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ Session::get('success') }}</strong>
                </span>
               </div>
            @endif
                
            <form method="POST" action="{{route('contact.store')}}">
                @csrf


                
                    <div class="form-row" style="background: #ddd;">
                        <div class="form-group col-md-6">
                            <label for="name">Name <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Write Your Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Write Your Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Mobile No <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Write Your Mobile No" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address <span style="color: red;font-weight: bold;">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Write Your Address" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message">Message <span style="color: red;font-weight: bold;">*</span></label>
                            <textarea name="message" class="form-control" id="message" placeholder="Write Your Message" rows="5" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid black;width: 49%;">Office Location</h3>
                <iframe src="https://goo.gl/maps/gRrHukr42jtsez6W8" width="100%" height="410" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>

@endsection