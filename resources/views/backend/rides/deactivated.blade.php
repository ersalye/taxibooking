@extends('backend.layouts.master')


@section ('title', trans('labels.backend.menus.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop


@section('page-header')
    <h1>
        {{ trans('labels.backend.menus.management') }}
        <small>{{ trans('labels.backend.menus.active') }}</small>
    </h1>
@endsection




@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.menus.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.menus.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="menus-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.menus.table.id') }}</th>
                        <th>{{ trans('labels.backend.menus.table.name') }}</th>
                        <th>{{ trans('labels.backend.menus.table.description') }}</th>
                        <th>{{ trans('labels.backend.menus.table.actions') }}</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#menus-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.menu.get") }}',
                    type: 'get',
                    data: {status: 0, trashed: false}
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'actions', name: 'actions'}

                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop