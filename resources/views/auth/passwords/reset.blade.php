<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> {{trans('login.title')}}</title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}"/>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"> <br/></h1>

        </div>
        <h3>{{trans('login.welcome')}}</h3>
        {{--<p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>--}}

        <form class="m-t" action="{{ url('/password/reset') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block m-b-none">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group  {{($errors->has('password')) ? 'has-error' : ''}}">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block m-b-none">{{$errors->first('password')}}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password">

            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">{{trans('login.reset')}}</button>

        </form>
        <p class="m-t">
            <small>{{trans('login.copy')}} &copy; 2017</small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

@section('scripts')
@show

</body>

</html>
