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
                        <h1>{{$view->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-4">
                <img src="/images/img_1.jpg" alt="Free website template by Free-Template.co" class="img-fluid rounded">
            </div>
            <div class="col-md-7 ml-auto">
                <!-- <h2 class="text-primary mb-3"></h2> -->
                <div class="font-weight-bold">{{$view->tel}}</div>
                <div class="font-weight-bold">{{$view->address}}</div>
                <div class="mb-3">{{$view->opentime}}</div>
                <p class="mb-4">{{$view->description}}</p>

                <div>
                    <div class="font-weight-bold">{{"選擇出發日期"}}</div>

                </div>

                <form class="form-group row">


                    <input class="col form-control" id="formControInputDate" type="datetime-local" name="traveltime">
        
                    <button type="submit" class="btn btn-primary mb-2 ml-3 col-2 ">確認</button>


                </form>

                <!-- <ul class="ul-check list-unstyled success">
                    <li>Adipisci dolore reprehenderit</li>
                    <li>Accusamus dicta laborum</li>
                    <li>Delectus sed labore</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>

</body>

</html>