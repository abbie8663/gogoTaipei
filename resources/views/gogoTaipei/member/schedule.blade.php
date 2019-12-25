@extends('layouts.master')

@section('title', 'Home')


@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>我的行程</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section" data-aos="fade">
    <div class="container">
        <!-- 程式碼打在這裡 -->
        <ul class="list-group">
            @foreach($schedule as $row)
            <li class="row list-group-item d-flex justify-content-between align-items-center">
                <div class="col">
                    {{$row->u_name}}
                </div>
                <div class="col">
                    {{$row->v_name}}
                </div>

            </li>
            @endforeach
        </ul>
    </div>
</div>


@endsection