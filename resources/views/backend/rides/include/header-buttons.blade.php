

<div class="pull-right mb-10">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.menus.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.ride.index', trans('menus.backend.menus.all')) }}</li>

            @permission('manage-users')
                <li>{{ link_to_route('admin.ride.create', trans('menus.backend.menus.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('admin.ride.deactivated', trans('menus.backend.menus.deactivated')) }}</li>
            <li>{{ link_to_route('admin.ride.deleted', trans('menus.backend.menus.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
