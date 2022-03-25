@extends('layouts-app')

@section('content')
    <style>
        div:empty::before {
            color: white;
            font-size: 30px;
        }
        div[data-placeholder]:not([data-placeholder=""]):empty::before {
            content: attr(data-placeholder);
        }
        div:empty::before {
            content: '';
        }
    </style>
    <div class="container mt-5">
        <div class="alert alert-warning">
            <p class="text-dark" style="font-weight: bold">Don't try to do something stupid! Your
                IP: {{Request::ip()}}</p>
        </div>
        <div class="card">
            <div style="border: 1px solid #e14eca;" class="container">
                <div class="card-header mb-5">{{config('app.name')}}</div>
                <div class="card-body">
                    <form id="ide-post" action="{{route('ide')}}" method="POST">
                        @csrf
                        <div class="navbar navbar-expand-md mb-4">&nbsp; &nbsp;
                            <select style="border: 1px solid #e14eca;" id="languages"
                                    class="languages form-control-plaintext text-primary {{ $errors->has('language') ? ' is-invalid' : '' }}"
                                    onchange="changeLanguage()">
                                <option value="">Select Language</option>
                                <option value="python">Python</option>
                                <option value="c"> C</option>
                                <option value="cpp">C++</option>
                                <option value="php">PHP</option>
                                <option value="node">Node JS</option>
                            </select>
                        </div>
                        {{--       Editor Goes Here      --}}
                        <div class="card pt-4">
                            <div style="border: 1px solid #e14eca;" class="editor" id="editor"></div>
                        </div>
                        {{--       Form Submit Button      --}}
                        <div style="text-align: center;">
                            <div class="pb-4 position-relative">
                                <a href="#feedback">
                                <button class="ide-btn btn btn-primary btn-block" id="ide-btn" type="submit" onclick="executeCode()">
                                    <i class="tim-icons icon-settings-gear-63 rotate" style="font-size: 40px;"></i>
                                </button>
                                </a>
                            </div>
                        </div>
                    </form> {{--        Form Ends Here        --}}

                    {{--        Output Begins Here       --}}
                    <div class="font-icon-list col-lg-12 col-md-12">
                        <a id="feedback">
                            <div class="error-alert alert alert-danger" style="display: none; font-weight: bold; font-size: 24px;" role="alert"></div>
                        </a>
                            <div style="background-color: #1e1e2f; min-height: 200px;" class="font-icon-detail">
                            <div style="background-color: #1e1e2f; " data-placeholder="😴 😴 😴" class="output"></div>
                        </div>
                    </div>
                    {{--      Output Ends Here     --}}
                </div> <!-- Card Body Ends Here -->
            </div> <!-- Main Container Ends Here -->
        </div> <!-- Card Ends Here -->
    </div> <!-- Container mt-5 Ends Here -->
    </div>

    @include('includes.footer')

@endsection
