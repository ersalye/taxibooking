@extends('backend.layouts.master')


@section ('title', trans('labels.backend.contacts.management'))

@section('after-styles-end')
    {{ Html::style("public/css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop


@section('page-header')
    <h1>
        {{ trans('labels.backend.contacts.management') }}
        <small>{{ trans('labels.backend.contacts.active') }}</small>
    </h1>
@endsection




@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.contacts.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.contacts.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="contact-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>


                        <th>{{ trans('labels.backend.contacts.table.id') }}</th>


                        <th>{{ trans('labels.backend.contacts.table.name') }}</th>

                        <th>{{ trans('labels.backend.contacts.table.mobile') }}</th>



                        <th>{{ trans('labels.backend.contacts.table.email') }}</th>


                        <th>{{ trans('labels.backend.contacts.table.subject') }}</th>



                        <th>{{ trans('labels.backend.contacts.table.created_at') }}</th>




                        <th>{{ trans('labels.backend.contacts.table.actions') }}</th>

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
            $('#contact-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.contact.get") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [

                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'mobile', name: 'number'},
                    {data: 'email', name: 'email'},
                    {data: 'subject', name: 'subject'},

                    {data: 'created_at',name:'created_at'},
                    {data: 'actions', name: 'actions'}

                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop