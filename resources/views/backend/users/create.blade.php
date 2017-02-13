@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.menus.management') . ' | ' . trans('labels.backend.menus.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.menus.management') }}
        <small>{{ trans('labels.backend.menus.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.restaurant.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.restaurants.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.menus.include.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('namel', trans('labels.backend.menus.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->



            <div class="form-group">
                {{ Form::label('descriptionl', trans('labels.backend.menus.description'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}

                <div class="col-lg-10">
                    {{ Form::textarea('description', null,['class' => 'form-control']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->




        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.menu.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
