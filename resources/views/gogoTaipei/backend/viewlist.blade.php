@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">

      <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">

        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h1>景點管理</h1>
            {{-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> --}}
          </div>
        </div>


      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    {{-- <div class=" align-items-center justify-content-center "> --}}
    {{-- 測 --}}
    <div class="row align-items-center justify-content-center mb-3">

      <a href="{{ action('AdminController@add') }}" class="btn btn-primary text-white"> Add data</a>

    </div>
    {{-- <div class="col-md-12"> --}}
    <form action="{{ action('AdminController@search') }}" method="get">
      <div class="row align-items-center justify-content-center mb-3">
        <div class="col-9">
          <input type="search" name="search" class="form-control">
        </div>

        {{-- <span class="form-group-btn"> --}}
        <button type="submit" class="col-2 mx-1 btn btn-primary text-white ">Search</button>
        {{-- </span> --}}

        {{-- <div class="col-2"> --}}
        {{-- <a href="{{ action('Bsackend\ViewlistController@add') }}" class="col-1 btn btn-primary text-white"> Add data</a> --}}
        {{-- </div> --}}
      </div>
    </form>

    {{-- 測 --}}

    {{-- </div> --}}

    <div class="content-loader table ">
      <table class="table table-bordered ">
        <thead>
          <tr>
            {{-- 'id', 'name', 'description', 'tel','address', 'zipcode', 'opentime', 'px', 'py' --}}
            <th>Action</th>
            <th>ID</th>
            <th>Name</th>
            <th>Tel</th>
            <th>Zip</th>
            <th>Opentime</th>
            <th>px</th>
            <th>py</th>
            <th>address</th>
            <th>description</th>
          </tr>
        </thead>
        @foreach ($view as $v)
        <tr>
          <td>
            <form action="{{ action('AdminController@destroy', $v->vid)}}" method="post">
              <a href="{{ action('AdminController@edit', $v->vid) }}" class="btn btn-primary text-white"> edit</a>
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning text-white">delete</button>
            </form>
          </td>
          <td>{{ $v->vid }}</td>
          <td>{{ $v->name }}</td>
          <td>{{ $v->tel }}</td>
          <td>{{ $v->zipcode }}</td>
          <td class="inline-block text-truncate" style="max-width: 200px;">{{ $v->opentime }}</td>
          <td>{{ $v->px }}</td>
          <td>{{ $v->py }}</td>
          <td>{{ $v->address }}</td>
          <td class="inline-block text-truncate" style="max-width: 200px;">{{ $v->description }}</td>

        </tr>
        @endforeach
      </table>
    </div>
    <div class="row align-items-center justify-content-center">
      @if($search != 'NULL' )
      {{ $view->appends(['search' =>$search])->render()  }}
      @else
      {{ $view->render()  }}
      @endif
    </div>

  </div>
</div>
</div>
</div>

@endsection