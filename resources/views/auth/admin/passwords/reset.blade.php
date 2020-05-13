<link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/bootstrap.min.css')}}" media="all" />
    <!-- icofont css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/icofont.css')}}" media="all" />
    <!-- carousel css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/owl.carousel.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/owl.theme.default.min.css')}}" media="all" />
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/animate.min.css')}}" media="all" />
    <!-- counterup css -->
    <link href="{{asset('frontEnd/css/jquery.classycountdown.css')}}" rel="stylesheet" type="text/css">
    
    <!-- query.wm-zoom-1 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/jquery.wm-zoom-1.0.min.css')}}" media="all" />
    <!-- flexslider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/flexslider.css')}}" media="all" />
    <!-- fonts/stylesheet css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/fonts/stylesheet.css')}}" media="all" />
    
    <!-- slicknav css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/slicknav.min.css')}}" media="all" />
    
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/main.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/style.css')}}" media="all" />
    
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/responsive.css')}}" media="all" />

    <style type="text/css">
        body {
            background-color: #2B333E;
        }
    </style>

    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Admin Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

