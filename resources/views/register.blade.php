<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />
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
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
          
                          <form method="POST" action="{{ route('user.register') }}" class="mx-1 mx-md-4" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <!-- Name -->
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}"  />
                                <label class="form-label" for="name">Your Name</label>
                                
                              </div>
                              <span class="text-danger">
                                @error('name')
                                  {{$message}}
                                @enderror
                              </span>
                            </div>
          
                            <!-- Email -->
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off"  />
                                <label class="form-label" for="email">Your Email</label>
                              </div>
                              <span class="text-danger">
                                @error('email')
                                  {{$message}}
                                @enderror
                              </span>
                            </div>

                            <!-- Phone Number -->
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-mobile fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                  <input type="tel" name="phone" id="phone" class="form-control" value="{{old('phone')}}" autocomplete="off"  />
                                  <label class="form-label" for="phone">Phone Number</label>
                                </div>
                                <span class="text-danger">
                                  @error('phone')
                                    {{$message}}
                                  @enderror
                                </span>
                            </div>

                            <!-- Picture -->
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-camera fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="file" name="picture" id="picture" class="form-control" value="{{old('picture')}}" accept="image/*" />
                                    <label class="form-label" for="picture"></label>
                                </div>
                                <span class="text-danger">
                                  @error('picture')
                                    {{$message}}
                                  @enderror
                                </span>
                            </div>
          
                            <!-- Password -->
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="password" name="password" id="password" class="form-control"  />
                                <label class="form-label" for="password">Password</label>
                              </div>
                              <span class="text-danger">
                                @error('password')
                                  {{$message}}
                                @enderror
                              </span>
                            </div>
          
                            <!-- Password Confirmation -->
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                              <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  />
                                <label class="form-label" for="password_confirmation">Repeat your password</label>
                              </div>
                              <span class="text-danger">
                                @error('password_confirmation')
                                  {{$message}}
                                @enderror
                              </span>
                            </div>

                            <!-- Register Button -->
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>

                            <!-- Login Link -->
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <a href="/login" class="btn btn-link">Already have an account? Login here</a>
                            </div>
          
                          </form>
          
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
</body>
</html>
