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
            </div>
        </div>
    </div>
</div>

<div class="site-section" data-aos="fade">
    <div class="container">
     <div class="row col-md-12 align-items-stretch">
     <div class="col-md-12 col-lg-12 mb-4 mb-lg-4">
     <div class="h-entry">
     <div class="h-entry-inner"><div class="form-group form-check">
        
       {{-- <form method="POST" action="{{route('delete')}}" class="p-5 bg-white" style="margin-top: 400px margin-right:60%;"> --}}
      
        <form method="POST" action="{{route('delete')}}">
            {{ csrf_field() }}
        {{-- {{method_field('DELETE')}} --}}
      @foreach ($message as $data)<h2 class="font-size-regular">
       
        <input type="checkbox" class="form-check-input" name="checkbox[]" value="{{$data->m_id}}">
        <span class="mx-2">&bullet;</span>{{$data->title}}<span class="mx-2">&bullet;</span> {{$data->date}}</h2>
      <h2 class="font-size-regular"><a href="#l">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->name}}</a></h2> 
      <h2 class="font-size-regular"> <p>&nbsp;&nbsp;&bullet;{{$data->content}}</p></h2>
      
    
    
     <hr>@endforeach  <button type="submit" class="btn btn-outline-primary btn-lg">Delete</button>
      {{-- <h2>  --}}
    
     {{-- <input type="submit" value="Delete" class="font-size-regular btn btn-primary"></h2> --}}
    </form>  
    {{-- <h2 class="btn btn-outline-primary"><a href="{{route('delete')}}">Delete</a></h2>  --}}
  </div></div></div></div></div>
  <div class="row align-items-center justify-content-center">
    <br>{{$message->links()}}  
    </div> 
    </div>
</div>


@endsection