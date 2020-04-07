@extends('layouts.client-app')

@section('page-title')
<div class="row bg-title top-left-part2" >
    <!-- .page title -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="circle w__40 light-blue">{{$user->pnombre[0]}}</span>{{$user->pnombre}} {{$user->papellido}}</h4>
    </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('client.dashboard.index') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('client.projects.index') }}">{{ __($pageTitle) }}</a></li>
                <li class="active">@lang('modules.projects.files')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')

<link rel="stylesheet" href="{{ asset('plugins/bower_components/dropzone-master/dist/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/docu.css') }}">
<style>
    .file-bg {
        height: 150px;
        overflow: hidden;
        position: relative;
    }
    .file-bg .overlay-file-box {
        opacity: .9;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        text-align: center;
    }

</style>
@endpush

@section('content')

    <div class="row abajo-titulo">
        <div class="col-md-12">
            <div id="page-content">
              <div class="comp-documents" >
                    <div id="content" class="completed-docs">
                        <div class="page-title m-b-40" style="color: #fff; text-transform: none">
                            <img src="{{asset('img/icon-completed-doc.png')}}" style="vertical-align: sub" alt="">&nbsp; Mis documentos
                            <img src="{{asset('img/docs-completed-banner.png')}}" class="banner-img img-responsive pull-right" alt="">
                            <h1 class="big-title text-white" style="font-size: 32px">Ahora que estás en este paso, debes subir los documentos que se indican abajo para poder comenzar</h1>
                            <p class="text-white">Estos documentos estarán protejidos y solo podran ser vistos por ti como usuario y nosotros.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list m-t-80" style="position: relative;">
                            <div class="grid hover-effect">
                                <div class="col col-3" style="order: -1">
                                    <div class="inner js-link-open-document  " data-popover-id="">
                                        <img src="{{asset('img/meeting-minute.png')}}">
                                        <div class="title">
                                            Subir liquidaciones de sueldo
                                        </div>
                                        <p>A comprehensive package of all the licenses, permits and tax registrations required for your business as well as the application forms to file with the appropriate licensing authorities.</p>
                                        <p style="flex: 0; margin: 0;">
                                            <a href="javascript:void(0)" data-doc-id="6" data-url-open-document="https://www.incfile.com/dashboard/documents/ly1q315sk9z4y4wtwfjqrkb1tgxm008fka07ml370mafdqa8aknv2c7j9rx4fa907v18jnt1m2cff7abfgd4dd19" data-document-name="Business License Research Package" class="btn btn-round m-b-15  btn-outline-red btn-view-doc">Ver documentos</a>
                                        </p>
                                        <p style="flex: 0; margin: 0;">
                                            <a href="javascript:;" id="show-dropzone" class="btn btn-round m-b-15  btn-outline-green btn-view-doc">Cargar</a>
                                        </p>
                                        <div class="row m-b-20 hide" id="file-dropzone">
                                            <div class="col-md-12">
                                                <form action="{{ route('client.files.store') }}" class="dropzone"
                                                      id="file-upload-dropzone">
                                                    {{ csrf_field() }}

                                                    {!! Form::hidden('project_id', $project->id) !!}

                                                    <input name="view" type="hidden" id="view" value="list">
                                                    <input name="view" type="hidden" id="tipo_doc" value="list">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modelDocument">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Modal title</h4>
                                    </div>
                                    <div class="modal-body" style="padding-bottom:0">
                                        <p>One fine body…</p>
                                    </div>
                                    <div class="modal-footer" style="border:none; padding-right: 25px">
                                        <button type="button" class="btn btn-green" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            <section>
                <div class="sttabs tabs-style-line">

                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="files-list-panel">
                                    <div class="white-box">
                                        <h2>@lang('modules.projects.files')</h2>

                                        <div class="row m-b-10">
                                            <div class="col-md-12">
                                                <a href="javascript:;" id="show-dropzone"
                                                   class="btn btn-success btn-outline"><i class="ti-upload"></i> @lang('modules.projects.uploadFile')</a>
                                            </div>
                                        </div>

                                        <div class="row m-b-20 hide" id="file-dropzone">
                                            <div class="col-md-12">
                                                <form action="{{ route('client.files.store') }}" class="dropzone"
                                                      id="file-upload-dropzone">
                                                    {{ csrf_field() }}

                                                    {!! Form::hidden('project_id', $project->id) !!}

                                                    <input name="view" type="hidden" id="view" value="list">

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs" role="tablist" id="list-tabs">
                                            <li role="presentation" class="active nav-item" data-pk="list"><a href="#list" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> List</span></a></li>
                                            <li role="presentation" class="nav-item" data-pk="thumbnail"><a href="#thumbnail" class="nav-link thumbnail" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Thumbnail</span></a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="list">
                                                <ul class="list-group" id="files-list">
                                                    @forelse($project->files as $file)
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    {{ $file->filename }}
                                                                </div>
                                                                <div class="col-md-3">

                                                                        <a target="_blank" href="{{ asset_url_local_s3('project-files/'.$project->id.'/'.$file->filename) }}"
                                                                           data-toggle="tooltip" data-original-title="View"
                                                                           class="btn btn-info btn-circle"><i
                                                                                    class="fa fa-search"></i></a>


                                                                    @if(is_null($file->external_link))
                                                                    <a href="{{ route('client.files.download', $file->id) }}"
                                                                       data-toggle="tooltip" data-original-title="Download"
                                                                       class="btn btn-default btn-circle"><i
                                                                                class="fa fa-download"></i></a>


                                                                    @if($file->user_id == $user->id)
                                                                        &nbsp;
                                                                        <a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-file-id="{{ $file->id }}" class="btn btn-danger btn-circle sa-params" data-pk="list"><i class="fa fa-times"></i></a>
                                                                    @endif
                                                                    @endif

                                                                    <span class="m-l-10">{{ $file->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    @lang('messages.noFileUploaded')
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforelse

                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="thumbnail">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/dropzone-master/dist/dropzone.js') }}"></script>
<script>
    $('#show-dropzone').click(function () {
        $('#file-dropzone').toggleClass('hide show');
    });

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.fileUploadDropzone = {
        paramName: "file", // The name that will be used to transfer the file
//        maxFilesize: 2, // MB,
        dictDefaultMessage: "@lang('modules.projects.dropFile')",
        accept: function (file, done) {
            done();
        },
        init: function () {
            this.on("success", function (file, response) {
                var viewName = $('#view').val();
                if(viewName == 'list') {
                    $('#files-list-panel ul.list-group').html(response.html);
                } else {
                    $('#thumbnail').empty();
                    $(response.html).hide().appendTo("#thumbnail").fadeIn(500);
                }
            })
        }
    };

    $('.thumbnail').on('click', function(event) {
        event.preventDefault();
        $('#thumbnail').empty();
        var projectID = "{{ $project->id }}";
        $.easyAjax({
            type: 'GET',
            url: "{{ route('client.files.thumbnail') }}",
            data: {
                id: projectID
            },
            success: function (response) {
                $(response.view).hide().appendTo("#thumbnail").fadeIn(500);
            }
        });
    });


    $('#list-tabs').on("shown.bs.tab",function(event){
        var tabSwitch = $('#list').hasClass('active');
        if(tabSwitch == true) {
            $('#view').val('list');
        } else {
            $('#view').val('thumbnail');
        }
    });

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('file-id');
        var deleteView = $(this).data('pk');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "{{ route('client.files.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE', 'view': deleteView},
                    success: function (response) {
                        console.log(response);
                        if (response.status == "success") {
                            $.unblockUI();
                            if(deleteView == 'list') {
                                $('#files-list-panel ul.list-group').html(response.html);
                            } else {
                                $('#thumbnail').empty();
                                $(response.html).hide().appendTo("#thumbnail").fadeIn(500);
                            }
                        }
                    }
                });
            }
        });
    });

</script>
@endpush
