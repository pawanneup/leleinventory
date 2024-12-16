<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
   <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css"
rel="stylesheet"
/>
  
</head>
<body>

  

    <div>
        <section class="vh-100" style="background-color: #fefefe;">
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 5px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                          @if(session()->has('success'))  
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        
                            {{-- @if(session()->has('error'))  
                            <div class="alert alert-error">
                                <p>{{ session()->get('error') }}</p>
                            </div>
                            @endif --}}
                          <form method="POST" action="{{route('user.login')}}" class="mx-1 mx-md-4" autocomplete="off">
                        
                            @csrf
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off" />
                                <label class="form-label" for="email">Your Email</label>
                              </div>
                              <span class="text-danger">
                                @error('email')
                                  {{$message}}
                                @enderror
                              </span>
                            </div>

                            
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" />
                                <label class="form-label" for="password">Password</label>
                              </div>
                              <span class="text-danger">
                                @error('password')
                                  {{$message}}
                                @enderror
                              </span>
                            </div>
          
                         
          
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button  type="submit"  class="btn btn-primary btn-lg">Login</button>
                            </div>

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <a href="/register" class="btn btn-link">Don't have an account? Register here</a>
                            </div>
          
                          </form>
          
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
          
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                            class="img-fluid" alt="Sample image">
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
    <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"
></script>
</body>
</html>