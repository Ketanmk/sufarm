@extends('layouts.apptokens')

@section('title', 'Main page')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="passport" id="passport">
                    <!-- let people make clients -->

                    <!-- list of clients people have authorized to access our account -->
                    <passport-authorized-clients></passport-authorized-clients>

                    <!-- make it simple to generate a token right in the UI to play with -->
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/passport.js') !!}" type="text/javascript"></script>
@endsection
