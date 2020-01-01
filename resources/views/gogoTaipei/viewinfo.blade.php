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


        @if (session('message'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
        @elseif (session('alert'))
        <div class="alert alert-primary">
            {{ session('alert') }}
        </div>
        @endif

        


        <div class="row ">
            <div class="col-md-4">
            <img src="/images/pic/{{$row->vid}}.jpg" onerror="this.src='/images/default_.jpg'"  class="img-fluid rounded">
            </div>
            <div class="col-md-7 ml-auto">
                <!-- <h2 class="text-primary mb-3"></h2> -->
                <div class="font-weight-bold">{{$view->tel}}</div>
                <div class="font-weight-bold">{{$view->address}}</div>
                <div class="mb-3">{{$view->opentime}}</div>
                <p class="mb-4">{{$view->description}}</p>

                <form class="form-group needs-validation" action="{{ action('ScheduleController@insert',$view->vid) }}" method="post" novalidate>
                    {{ csrf_field() }}


                    <div class="form-row">
                        <div class="col-5">
                            <label class="font-weight-bold">選擇出發時間</label>
                        </div>
                        <div class="col-5">
                            <label class="font-weight-bold">選擇結束時間</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-5">
                            <input class="form-control" type="datetime-local" name="start_date" required>
                            <div class="invalid-feedback">
                                Please choose your beginning day.
                            </div>
                        </div>

                        <div class="col-5">
                            <input class="form-control" type="datetime-local" name="end_date" required>
                            <div class="invalid-feedback">
                                Please choose your ending day.
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary  ">確認</button>
                        </div>
                    </div>



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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection