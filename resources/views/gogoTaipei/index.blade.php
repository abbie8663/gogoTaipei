    @extends('layouts.master')

    @section('title', 'Home')
    @section('nav_home', 'active')
    @section('content')

    <div class="site-blocks-cover overlay" style="background-image: url(/images/xmas_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">


                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up">GOGO <span class="typed-words"></span></h1>
                            {{-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> --}}
                        </div>
                    </div>

                    <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
                        <form action="{{ action('ViewController@search') }}" method="get">
                        {{ csrf_field() }}
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                                    <input type="text" class="form-control" name="search" placeholder="Where are you looking for?">
                                </div>


                                <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                    <input type="submit" class="btn text-white btn-primary" value="Search">
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection