@extends('layouts.main')
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('images/login/3.png')}}" alt="logo"></div>
      <div class="col-xl-7 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start" href="{{url('/')}}"><img class="img-fluid for-light" src="{{asset('images/logo/logo.png')}}" alt="logo"><h3>CRM</h3><img class="img-fluid for-dark" src="{{asset('images/logo/logo_dark.png')}}" alt="logo"></a></div>
               <div class="login-main">
                    <form method="POST" action="{{ route('login') }}" class="theme-form needs-validation" novalidate="">
                    @csrf
                     <h4>Sign in to account</h4>
                     <p>Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input id="emailaddress" placeholder="Test@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="invalid-tooltip">Please enter valid email.</div>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>

                        <input id="password" type="password" class="form-control @error('password')  @enderror" name="password" required autocomplete="current-password" placeholder="*********">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="invalid-tooltip">Please enter password.</div>
                        <div class="show-hide"><span class="show"></span></div>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                     {{--
                     <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                     <div class="social mt-4">
                        <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                     </div>

                     --}}
                        <p class="mt-2 mb-0"><a class="ms-2" href="{{route('password.request')}}">Forgot Password !</a></p>
                     <script>
                        (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {

                                if (form.checkValidity()) {
                                    form.classList.add('was-validated');
                                }else{
                                    event.preventDefault();
                                    event.stopPropagation();
                                }

                            }, false);
                        });
                        }, false);
                        })();

                     </script>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
