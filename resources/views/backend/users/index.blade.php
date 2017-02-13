@extends('backend.layouts.master')


@section ('title', trans('labels.backend.users.management'))

@section('after-styles-end')
    {{ Html::style("public/css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop



@section('page-header')
    <h1>
        {{ trans('labels.backend.users.management') }}
        <small>{{ trans('labels.backend.users.active') }}</small>
    </h1>
@endsection




@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.restaurants.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.users.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="users-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.users.table.id') }}</th>
                        <th>{{ trans('labels.backend.users.table.name') }}</th>
                        <th>{{ trans('labels.backend.users.table.roles') }}</th>
                        <th>{{ trans('labels.backend.users.table.phone') }}</th>
                        <th>{{ trans('labels.backend.users.table.email') }}</th>
                        <th>{{ trans('labels.backend.users.table.approved') }}</th>

                        <th>{{ trans('labels.backend.users.table.confirmed') }}</th>

                        <th>{{ trans('labels.backend.users.table.created') }}</th>
                        <th>{{ trans('labels.backend.users.table.last_updated') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
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
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.user.get")."?filter=".request("filter") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'roles', name: 'roles'},
                    {data: 'mobile', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'approved', name: 'approved'},

                    {data: 'confirmed', name: 'confirmed'},

                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop