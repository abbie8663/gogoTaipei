@extends('layouts.master')

@section('title', 'Home')
@section('nav_message', 'active')

@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h1>留言板</h1>
          </div>
        </div>

        <div class="form-search-wrap p-2 mt-5" data-aos="fade-up" data-aos-delay="200" style="height: 100px">
          <form action="{{route('search')}}" method="POST">
            {{ csrf_field() }}
            <div class="row align-items-center">
              <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                <input type="text" class="form-control" name="search" placeholder="Search for message">
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


<div class="site-section" data-aos="fade">
  <div class="container">


    <div class="row col-md-12 align-items-stretch">
      <div class="col-md-12 col-lg-12 mb-4 mb-lg-4">
        <div class="h-entry">
          <div class="h-entry-inner">
            @foreach ($message as $data)<h2 class="font-size-regular">
              <span class="mx-2">&bullet;</span>{{$data->title}}<span class="mx-2">&bullet;</span> {{$data->date}}</h2>
            <h2 class="font-size-regular"><a href="#l">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->name}}</a></h2>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$data->content}}</p>
            <hr> @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="row align-items-center justify-content-center">
      <br>{{$message->links()}}
    </div>

    <div class="row">

      <div class="col-md-7 mb-5" data-aos="fade">

        <form method="POST" action="{{route('store')}}" class="p-5 bg-white" style="margin-top: 400px margin-right:60%;">
          {{ csrf_field() }}
          <div class="row form-group">

            <div class="col-md-12">
              <label class="text-black" for="title">標題</label>
              <input type="title" id="title" name="title" class="form-control">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="date">日期</label><br>
              <input type="date" name="date" placeholder="2014-09-18">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="content">內文</label>
              <textarea name="content" id="content" cols="30" rows="7" class="form-control" placeholder="Write your comments here..."></textarea>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="送出" class="btn btn-primary btn-md text-white">
            </div>
          </div>


        </form>

      </div>

    </div>


  </div>
</div>


@endsection