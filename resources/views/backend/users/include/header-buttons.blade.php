

<div class="pull-right mb-10">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.users.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.user.index', trans('menus.backend.users.all')) }}</li>

            @foreach($roles as $role)
                 <li> <a href="{{route('admin.user.index')."?filter=".$role->name}}"> {{$role->name}}</a> </li>
            @endforeach
            @permission('manage-users')
                <li>{{ link_to_route('admin.user.create', trans('menus.backend.users.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('admin.user.deactivated', trans('menus.backend.users.deactivated')) }}</li>
            <li>{{ link_to_route('admin.user.deleted', trans('menus.backend.users.deleted')) }}</li>
        </ul>
    </div><!--btn group-->

</div><!--pull right-->

<div class="clearfix"></div>
