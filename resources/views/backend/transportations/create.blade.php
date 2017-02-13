@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.transportations.management') . ' | ' . trans('labels.backend.transportations.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.transportations.management') }}
        <small>{{ trans('labels.backend.transportations.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.transportation.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.transportations.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.transportations.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">


            <div class="form-group">
                {{ Form::label('namel', trans('labels.backend.transportations.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->


         <div class="form-group">
                {{ Form::label('number', trans('labels.backend.transportations.currency_type'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('currency_type', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->


            <div class="form-group">
                {{ Form::label('fare_per_hour', trans('labels.backend.transportations.fare_per_hour'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('fare_per_hour', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->




            <div class="form-group">
                {{ Form::label('fare_per_km', trans('labels.backend.transportations.fare_per_km'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('fare_per_km', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('waiting_change', trans('labels.backend.transportations.waiting_change'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('waiting_change', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->



            <div class="form-group">
                {{ Form::label('descriptionl', trans('labels.backend.transportations.description'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}

                <div class="col-lg-10">
                    {{ Form::textarea('description', null,['class' => 'form-control']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->




        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.transportation.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts-end')
    {{ Html::script('js/backend/access/users/script.js') }}
@stop
