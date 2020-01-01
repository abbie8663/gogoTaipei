@extends('layouts.master')

@section('title', 'Home')
@section('content')

<style>
    .collectLabel{
        cursor: pointer;
    }
    .red{
        background: #f23a2e !important;
    }
</style>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>收藏</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section" data-aos="fade">
    <div class="container">
    <div class="row">
    @foreach($favorite as $row)
    <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">
                <div class="listing-item">
                    <div class="listing-image">
                    <img src="/images/pic/{{$row->vid}}.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>
                    <div class="listing-item-content">

                        @if($row->status == true)
                        <label class="collectLabel bookmark red"  data-viewid="{{$row->vid}}" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></label>
                        @else
                        <label class="collectLabel bookmark" data-viewid="{{$row->vid}}" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></label>
                        @endif

                        <!-- 替代方案 @if($row->status == true)
                        <a href="/favorite/destory/{{$row->id}}" class="collectLabel bookmark red"  data-viewid="{{$row->id}}" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></a>
                        @else
                        <a href="/favorite/destory/{{$row->id}}" class="collectLabel bookmark" data-viewid="{{$row->id}}" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></a>
                        @endif  -->

                        <!-- 原本 <a href="/favorite/destory/{{$row->id}}" class="bookmark" data-toggle="tooltip" data-placement="left" title="收藏"><span class="icon-heart"></span></a> -->
                        <h2 class="mb-1"><a href="/views/{{$row->vid}}">{{$row->name}}</a></h2>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
    </div>
</div>

<script>
    $(document).on("click", ".collectLabel", function(){
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
            success: function(reponse){
                console.log("收藏: "+viewid);
                console.log("THIS: "+$(this));
                currentLabel.toggleClass("red");
                //var div;
                //div.delete();
            }
        });
    });
</script> 

@endsection