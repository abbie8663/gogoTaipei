@extends('layouts.master')

@section('title', 'Home')
@section('nav_views', 'active')

@section('content')

<style>
    .collectLabel {
        cursor: pointer;
    }

    .red {
        background: #f23a2e !important;
    }
</style>

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
                        <img src="/images/pic/{{$row->vid}}.jpg" onerror="this.src='/images/default_.jpg'" class="img-fluid">
                    </div>
                    <div class="listing-item-content">

                        @if($row->status == true)
                        <label class="collectLabel bookmark red" data-viewid="{{$row->vid}}" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></label>
                        @else
                        <label class="collectLabel bookmark" data-viewid="{{$row->vid}}" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></label>
                        @endif

                        <h2 class="mb-1"><a href="{{action('ViewController@show',$row->vid)}}">{{$row->name}}</a></h2>
                        <!-- <span class="address">West Orange, New York</span> -->
                    </div>
                </div>
            </div>
            @endforeach
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

<script>
    $(document).on("click", ".collectLabel", function() {
        console.log("click");
        var viewid = $(this).data("viewid");
        var currentLabel = $(this);
        $.ajax({
            url: '{{ asset("/favorite/add") }}',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'viewid': viewid
            },
            success: function(reponse) {
                console.log("收藏: " + viewid);
                console.log("THIS: " + $(this));
                currentLabel.toggleClass("red");
                //var div;
                //div.delete();
            }
        });
    });
</script>

@endsection('content')