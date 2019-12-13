@extends('layouts.master')

@section('title', 'Home')
@section('nav_views', 'active')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>viewlist</h1>
                        {{-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> --}}
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Most Visited Places</h2>
                <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="listings-single.html" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Hotels</a>
                        <h2 class="mb-1"><a href="listings-single.html">Luxe Hotel</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Restaurants</a>
                        <h2 class="mb-1"><a href="listings-single.html">Jones Grill &amp; Restaurants</a></h2>
                        <span class="address">Brooklyn, New York</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Events</a>
                        <h2 class="mb-1"><a href="listings-single.html">Live Band</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>

            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="listings-single.html" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Others</a>
                        <h2 class="mb-1"><a href="listings-single.html">Gourmet Coffees</a></h2>
                        <span class="address">New York City</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_5.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Spa</a>
                        <h2 class="mb-1"><a href="listings-single.html">La Italia Spa</a></h2>
                        <span class="address">Italy</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_6.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Stores</a>
                        <h2 class="mb-1"><a href="listings-single.html">Super Market Mall</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection('content')

