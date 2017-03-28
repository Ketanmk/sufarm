@extends('layouts.app')

@section('title', 'Main page')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Welcome in Sunder Farms Dash Boardd
                    </h1>
                    <small>
                    </small>
                </div>
            </div>
        </div>
        <!-- let people make clients -->
        <passport-clients></passport-clients>

        <!-- list of clients people have authorized to access our account -->
        <passport-authorized-clients></passport-authorized-clients>

        <!-- make it simple to generate a token right in the UI to play with -->
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@endsection
