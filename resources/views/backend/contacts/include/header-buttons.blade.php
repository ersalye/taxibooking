



<div class="pull-right mb-10">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.transportations.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.transportation.index', trans('menus.backend.transportations.all')) }}</li>

            @permission('manage-users')
                <li>{{ link_to_route('admin.transportation.create', trans('menus.backend.transportations.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('admin.transportation.deactivated', trans('menus.backend.transportations.deactivated')) }}</li>
            <li>{{ link_to_route('admin.transportation.deleted', trans('menus.backend.transportations.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
