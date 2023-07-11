@extends('admin.admin')

@section('title',"Home")
 
@section('content')
<div class="container-fluid plr_30 body_white_bg pt_30">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="single_element">
                <div class="quick_activity">
                    <div class="row">
                        <div class="col-12">
                            <div class="quick_activity_wrap">
                                <div class="single_quick_activity">
                                    <h4>Total Document</h4>
                                    <h3> <span class="counter">{{ $document }}</span> </h3>
                                   
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Total Mail</h4>
                                    <h3><span class="counter">{{$mail}}</span> </h3>
                                   
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Total Department</h4>
                                    <h3><span class="counter">{{$department}}</span> </h3>
                                   
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Total Service</h4>
                                    <h3><span class="counter">{{$service}}</span> </h3>
                                   
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Total Category</h4>
                                    <h3><span class="counter">{{$category}}</span> </h3>
                                   
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Total User</h4>
                                    <h3><span class="counter">{{$user}}</span> </h3>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
     
 
     
       
        
  

       
    </div>
</div>
@endsection

