@extends('layouts.app')

@section('title', 'Photos')
@section('styles')
    <link href="{!! asset('css/plugins/jasny/jasny-bootstrap.min.css')!!}" rel="stylesheet">

@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Photos</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>

                <li class="active">
                    <strong>Photos</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        @if (session('status'))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {!!  session('status') !!}.
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Here you can manage Photos</h5>
                        <div class="ibox-tools">

                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"
                               data-href='{{route('photos.create')}}'>
                                Create<i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th>Main Gallery</th>
                                    <th>Created By</th>
                                    <th>Last Updated By</th>
                                    <th width="5%">{{trans('main.titles.status')}}</th>
                                    <th width="20%">{{trans('main.titles.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($photos as $photo)
                                    <tr class="gradeX">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$photo->name}}</td>
                                        <td>{{$photo->category->name or '-'}}</td>
                                        <td>{{$photo->createdBy->name or ''}}</td>
                                        <td>{{$photo->updatedBy->name or ''}}</td>
                                        <td>
                                            {{($photo->status) ? 'Active' : ''}}
                                        </td>
                                        <td class="center">
                                            <a data-toggle="modal" class="btn btn-primary"
                                               href="#modal-form"
                                               data-href='{{route('photos.show',$photo->id)}}'>
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"
                                               data-href='{{route('photos.edit',$photo->id)}}'><i
                                                        class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> </a>
                                            <a data-popout="true" data-token='{{ csrf_token()}}'
                                               data-hreff='{{route('photos.destroy',$photo->id)}}'
                                               data-url='{{route('photos.index')}}' data-id='{{$photo->id}}'
                                               class="btn btn-danger red-mint delete-ajax"
                                               data-toggle="confirmation"
                                               data-original-title="{{trans('main.labels.delete_confirmation_message') }}"
                                               data-placement="top"
                                               data-btn-ok-label="{{trans('main.labels.delete')}}"
                                               data-btn-cancel-label=" {{ trans('main.labels.cancel')}}">
                                                <i class="fa fa-trash-o"></i></a>
                                            @if ($photo->status == 1)
                                                <a data-popout="true" data-token='{{ csrf_token()}}'
                                                   class="btn btn-danger red-mint delete-ajax"
                                                   data-hreff='{{route('photos.deactivate',$photo->id)}}'
                                                   data-url='{{route('photos.index')}}'
                                                   data-id='{{$photo->id}}'
                                                   data-toggle="confirmation"
                                                   data-original-title="{{trans('main.labels.deactivate_confirmation_message') }}"
                                                   data-placement="left"
                                                   data-btn-ok-label="{{trans('main.labels.deactivate')}}"
                                                   data-btn-cancel-label=" {{ trans('main.labels.cancel')}}">
                                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a data-popout="true" data-token='{{ csrf_token()}}'
                                                   class="btn btn-success  red-mint delete-ajax"
                                                   data-hreff='{{route('photos.activate',$photo->id)}}'
                                                   data-url='{{route('photos.index')}}'
                                                   data-toggle="confirmation"
                                                   data-original-title="{{trans('main.labels.activate_confirmation_message') }}"
                                                   data-placement="left"
                                                   data-btn-ok-label="{{trans('main.labels.activate')}}"
                                                   data-btn-cancel-label=" {{ trans('main.labels.cancel')}}">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th>Main Gallery</th>
                                    <th>Created By</th>
                                    <th>Last Updated By</th>
                                    <th width="5%">{{trans('main.titles.status')}}</th>
                                    <th width="20%">{{trans('main.titles.actions')}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js')!!}"></script>

    <script>
        $(document).ready(function () {


        });

    </script>
    <script src="{{asset('js/custom.js')}}"></script>
@endsection