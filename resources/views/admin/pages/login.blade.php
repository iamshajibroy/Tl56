<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title> Admin</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
        <meta name="viewport" content="width=device-width"/>
        <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ url('bootstrap/css/animate.min.css') }}" rel="stylesheet"/>
        <link href="{{ url('bootstrap/css/paper-dashboard.css') }}" rel="stylesheet"/>
        <link href="{{ url('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href='{{ url('https://fonts.googleapis.com/css?family=Muli:400,300') }}' rel='stylesheet' type='text/css'>
        <link href="{{ url('bootstrap/css/themify-icons.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                    Admin
                    </a>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            <div class="container" style="margin-top: 50px">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Sign In to admin dashbard</strong></h3>
                            </div>
                            <div class="panel-body">
                                @include('admin.layouts.message')
                                <form method="post" action="/admin/login">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" value="{{ old('email')}}" id="email" placeholder="Email"
                                        class="form-control border-input">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password"  id="password" placeholder="Password"
                                        class="form-control border-input">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-success" type="submit">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>