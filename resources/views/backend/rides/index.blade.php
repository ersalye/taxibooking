@extends('backend.layouts.master')


@section ('title', trans('labels.backend.menus.management'))

@section('after-styles-end')
    {{ Html::style("public/css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop


@section('page-header')
    <h1>
        {{ trans('labels.backend.ride.management') }}
        <small>{{ trans('labels.backend.ride.active') }}</small>
    </h1>
@endsection




@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.restaurants.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.rides.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="rides-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>


                        <th>{{ trans('labels.backend.menus.table.id') }}</th>


                        <th> user email</th>

                        <th>driver email </th>

                        <th>pickup location</th>

                        <th>dropoff location</th>

                        <th>Reach Time</th>

                        <th>Travel Time</th>

                        <th>distance</th>





                        <th>{{ trans('labels.backend.menus.table.actions') }}</th>

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
            $('#rides-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.ride.get") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [

                    {data: 'id', name: 'id'},
                    {data: 'user_email', name: 'user_email'},
                    {data: 'driver_email', name: 'driver_email'},
                    {data: 'pickup_location', name: 'pickup_location'},
                    {data: 'dropoff_location', name: 'dropoff_location'},
                    {data: 'reach_time', name: 'reach_time'},
                    {data: 'travel_time', name: 'travel_time'},
                    {data: 'distance', name: 'distance'},
                    {data: 'actions', name: 'actions'}

                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop