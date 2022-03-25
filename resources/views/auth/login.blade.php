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
        <div class="col-lg-4 col-md-6 mt-5 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" method="post" id="login" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-email-85"></i>
                                        </div>
                                    </div>
                                    <input type="email" name="email"
                                           autocomplete="off"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="{{__('Email')}}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-lock-circle"></i>
                                        </div>
                                    </div>
                                    <input type="password" placeholder="{{__('Password')}}" name="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="mt-4" style="text-align: center;">
                                    <button type="Submit" class="btn btn-block draw-border btn-default"><i
                                            style="font-size:22px;"
                                            class="tim-icons icon-lock-circle"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-3 mb-3" style="text-align: center;">
                    <a class="text-danger" href="{{ route('register')}}">Don't have an account?</a>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
@endsection
