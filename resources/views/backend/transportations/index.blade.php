@extends('backend.layouts.master')


@section ('title', trans('labels.backend.transportations.management'))

@section('after-styles-end')
    {{ Html::style("public/css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop


@section('page-header')
    <h1>
        {{ trans('labels.backend.transportations.management') }}
        <small>{{ trans('labels.backend.transportations.active') }}</small>
    </h1>
@endsection




@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.transportations.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.transportations.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="transportations-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>


                        <th>{{ trans('labels.backend.transportations.table.id') }}</th>


                        <th>{{ trans('labels.backend.transportations.table.name') }}</th>


                        <th>{{ trans('labels.backend.transportations.table.currency_type') }}</th>


                        <th>{{ trans('labels.backend.transportations.table.fare_per_hour') }}</th>


                        <th>{{ trans('labels.backend.transportations.table.fare_per_km') }}</th>



                        <th>{{ trans('labels.backend.transportations.table.waiting_charge') }}</th>

                        <th>{{ trans('labels.backend.transportations.table.description') }}</th>


                        <th>{{ trans('labels.backend.transportations.table.actions') }}</th>

                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts-end')
    {{ Html::script("public/js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("public/js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#transportations-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.transportation.get") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [

                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'currency_type', name: 'currency_type'},
                    {data: 'fare_per_hour', name: 'fare_per_hour'},
                    {data: 'fare_per_km', name: 'fare_per_km'},
                    {data: 'waiting_change', name: 'waiting_change'},
                    {data: 'description',name:'description'},
                    {data: 'actions', name: 'actions'}

                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop