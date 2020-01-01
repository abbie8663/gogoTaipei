@extends('layouts.master')

@section('title', 'Home')
@section('map')

<script type='text/javascript'>
    var centreGot = false;
</script>
{!! $map['js'] !!}
@endsection


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


<div class="site-section">
    <!-- <div class="container"> -->
        <!-- 程式碼打在這裡 -->

        <div class="row mr-0 ml-0">
            <div class='col-1'></div>
            <div class="col-7">
                {!! $map['html'] !!}
            </div>
            <div class="col-3 ">



                <div class="row justify-content-center mb-3">
                    <!-- <div class="col-md-10 mt-3 text-center border-primary"> -->
                    <h2 class="font-weight-light text-primary">安排行程</h2>
                    <!-- <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p> -->
                    <!-- </div> -->
                </div>

 
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                    選擇出發日期
                </button>
     

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form class="form-group needs-validation" action="{{ action('ScheduleController@date') }}" method="post" novalidate>
                                {{ csrf_field() }}

                                <div class="modal-body">
                                    <input class="form-control" type="date" name="date" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>


                @foreach($schedule as $row)
                <div class="border p-3 rounded mb-2">
                    <a data-toggle="collapse" href="#{{$row->vid}}" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">{{$row->v_name}}</a>

                    <div class="collapse" id="{{$row->vid}}">
                        <div class="pt-2">
                            <div class="form-row justify-content-center">
                                <div class="col-md-10 mb-3">

                                    <form class="needs-validation" action="{{ action('ScheduleController@edit',$row->sid) }}" method="post" novalidate>
                                        {{ csrf_field() }}

                                        <div class="form-row mb-2">
                                            <div class="col">
                                                <label for="validationCustom01">Start Date</label>
                                                <input type="datetime-local" class="form-control" id="validationCustom01" name="start_date" value="{{$row->start_date}}" required>
                                                <div class="invalid-feedback">
                                                    快輸入start_date
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="validationCustom02">End Date</label>
                                                <input type="datetime-local" class="form-control" id="validationCustom02" name="end_date" value="{{$row->end_date}}" required>
                                                <div class="invalid-feedback">
                                                    你的end_date呢?
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary btn-sm float-right ml-2 mt-3" href="/schedule/delete/{{$row->sid}}" role="button">delete</a>
                                        <!-- <button class="btn btn-primary btn-sm float-right ml-2 mt-3" >delete</button> -->
                                        <button class="btn btn-primary btn-sm float-right mt-3" type="submit">edit</button>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <!-- <div class='col-1'></div> -->
        </div>

</div>


@endsection

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