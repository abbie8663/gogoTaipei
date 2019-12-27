@extends('layouts.master')

@section('title', 'Home')
@section('nav_views', 'active')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>viewlist</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section" data-aos="fade">
    <div class="container">
        <!-- <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary"></h2>
                
            </div>
        </div> -->
        <div class="row">
            @foreach($view as $row)
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">
                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="{{action('ViewController@show',$row->vid)}}" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <h2 class="mb-1"><a href="{{action('ViewController@show',$row->vid)}}">{{$row->name}}</a></h2>
                        <!-- <span class="address">West Orange, New York</span> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row align-items-center justify-content-center">
        {{ $view->links() }}
        </div>
       
    </div>
</div>

@endsection('content')