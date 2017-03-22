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
        <h3>{{trans('login.forgot')}}</h3>
        {{--<p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>--}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="m-t" action="{{ url('/password/email') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                <input type="email" class="form-control" placeholder="{{trans('login.email')}}" name="email">
                @if ($errors->has('email'))
                    <span class="help-block m-b-none">{{$errors->first('email')}}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">{{trans('login.send')}}</button>
            <p class="text-muted text-center">
                <small>{{trans('login.have_account')}}</small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="{{url('/login')}}">{{trans('login.login')}}</a>
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
