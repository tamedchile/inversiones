@extends('layouts.client-app')

@section('page-title')
<div class="row bg-title top-left-part2" >
    <!-- .page title -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="circle w__40 light-blue">{{$user->pnombre[0]}}</span>{{$user->pnombre}} {{$user->papellido}}</h4>
    </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('client.dashboard.index') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ __($pageTitle) }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
@endpush

@section('content')

    <div class="row " style="margin-top: 101px">
        <div class="col-md-12">
            <div class="white-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <a href="{{ route('client.tickets.create') }}"
                               class="btn btn-info btn-sm">@lang('modules.tickets.requestTicket') <i class="fa fa-plus"
                                                                                                 aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="tickets-table">
                        <thead>
                        <tr>
                            <th>@lang('modules.tickets.ticket') #</th>
                            <th>@lang('modules.tickets.ticketSubject')</th>
                            <th>@lang('modules.tickets.agent')</th>
                            <th>@lang('modules.tickets.requestedOn')</th>
                            <th>@lang('modules.sticky.lastUpdated')</th>
                            <th>@lang('app.status')</th>
                            <th>@lang('app.action')</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script>
    $(function() {
        var table = $('#tickets-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{!! route('client.tickets.data') !!}',
            deferRender: true,
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            "order": [[0, "desc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'subject', name: 'subject', width: '25%'},
                {data: 'agent_id', name: 'agent_id', width: '20%'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', "searchable": false}
            ]
        });

    });

</script>
@endpush
