@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/xmas.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">

      <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
        
        
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h1>新增景點</h1>
            {{-- <p data-aos="fade-up" data-aos-delay="100">Handcrafted free templates by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></p> --}}
          </div>
        </div>

        
      </div>
    </div>
  </div>
</div>  
    
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-center justify-content-center ">
        <div class="col-md-7 mb-5"  data-aos="fade">
          <form method="POST" action="{{ route('admin.viewlist.insert') }}" class="needs-validation p-5 bg-white" style="margin-top: -150px;" enctype="multipart/form-data" novalidate>
            
            {{-- 這行可以快速在表單中產生token，就不會出現 419 錯誤了 --}}
            {{ csrf_field() }}
            
            {{-- 'id', 'name', 'description', 'tel','address', 'zipcode', 'opentime', 'px', 'py' --}}

            <div class="form-group row">
                <label for="vid" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vid" placeholder="id" required>
                  <div class="invalid-feedback">
                    Please provide a ID.
                  </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" placeholder="name" required>
                  <div class="invalid-feedback">
                    Please provide a name.
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label for="tel" class="col-sm-2 col-form-label">Tel</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tel" placeholder="tel" required>
                <div class="invalid-feedback">
                  Please provide a tel.
                </div>
              </div>
            </div>
            <div class="form-group row">
                <label for="zipcode" class="col-sm-2 col-form-label">Zipcode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="zipcode" placeholder="zipcode" required>
                  <div class="invalid-feedback">
                    Please provide a zipcode.
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label for="opentime" class="col-sm-2 col-form-label">Opentime</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="opentime" placeholder="opentime" required>
                <div class="invalid-feedback">
                  Please provide a opentime.
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="px" class="col-sm-2 col-form-label">px</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="px" placeholder="px" required>
                <div class="invalid-feedback">
                  Please provide a px.
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="py" class="col-sm-2 col-form-label">py</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="py" placeholder="py" required>
                <div class="invalid-feedback">
                  Please provide a py.
                </div>
              </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="address" placeholder="address" required>
                  <div class="invalid-feedback">
                    Please provide a address.
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="description" rows="6" placeholder="description" required></textarea>
                <div class="invalid-feedback">
                  Please provide some description.
                </div>
              </div>
            </div>
            <div class="form-group row justify-content-end text-center">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary text-white">Insert</button>
                </div>
            </div>
          </form>
        </div>
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