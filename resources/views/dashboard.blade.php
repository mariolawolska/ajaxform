<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">

    </head>
    <body style="background: #BC9B78">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">

                                    <div class="mb-4 col-md-8" style="background: #BC9B78; padding: 15px;">
                                        <h3 class="login-heading mb-4">Welcome {{ ucfirst(Auth()->user()->name) }} !</h3>
                                        @include('leyout.head')


                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="btn btn-lg btn-primary btn-block btn-login text-uppercase  mb-2" href="{{ route('persons') }}" style="border-radius: 60px; font-size: 16px"role="button">Add Comments</a>
                                            </div>
                                        </div>
                                        <div class="row pt-5">
                                        <div class="col-md-4">
                                            <a  href="{{url('logout')}}">Logout</a>
                                        </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>