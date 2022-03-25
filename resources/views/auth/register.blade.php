@extends('layouts-app')
@section('content')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .draw-border {
            box-shadow: inset 0 0 0 4px #58afd1;
            color: #58afd1;
            transition: color 0.25s 0.0833333333s;
            position: relative;
        }

        .draw-border::before, .draw-border::after {
            border: 0 solid transparent;
            box-sizing: border-box;
            content: "";
            pointer-events: none;
            position: absolute;
            width: 0;
            height: 0;
            bottom: 0;
            right: 0;
        }

        .draw-border::before {
            border-bottom-width: 4px;
            border-left-width: 4px;
        }

        .draw-border::after {
            border-top-width: 4px;
            border-right-width: 4px;
        }

        .draw-border:hover {
            color: #58afd1;
        }

        .draw-border:hover::before, .draw-border:hover::after {
            border-color: #58afd1;
            transition: border-color 0s, width 0.25s, height 0.25s;
            width: 100%;
            height: 100%;
        }

        .draw-border:hover::before {
            transition-delay: 0s, 0s, 0.25s;
        }

        .draw-border:hover::after {
            transition-delay: 0s, 0.25s, 0s;
        }

        .btn {
            background: none;
            border: none;
            cursor: pointer;
            line-height: 1.5;
            font: 700 1.2rem "Roboto Slab", sans-serif;
            padding: 1em 2em;
            letter-spacing: 0.05rem;
        }

        .btn:focus {
            outline: 2px dotted #55d7dc;
        }
    </style>

    <div class="container">
        <div class="col-lg-5 col-md-8 mt-5 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="off" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="off">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <button type="Submit" class="btn draw-border btn-default btn-block"><i
                                    style="font-size:22px;"
                                    class="tim-icons icon-lock-circle"></i>
                            </button>
                        </div>
                        <div class="mt-3" style="text-align: center;">
                            <a class="text-danger" href="{{ route('login')}}">already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>

@endsection
