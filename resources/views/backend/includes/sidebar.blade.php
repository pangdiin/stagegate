<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4" style="min-height: 201px;">
  <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="padding:0;">
      <img src="{{ asset('images/stagegate.png') }}" alt="AdminLTE Logo img-responsive" class="" style="width:100%;">
    </a>
  

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->fullName }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- @role('administrator') --}}
        
        <li class="nav-item has-treeview {{ active_class(Active::checkUriPattern('access/*'), 'menu-open') }}">
          <a href="#" class="nav-link {{ active_class(Active::checkUriPattern('access/*')) }}">
            <i class="nav-icon fa fa-address-book"></i>
            <p>
              Roles and Permissions
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.roles.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('access/roles*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('access/permissions*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Permission</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview {{ active_class(Active::checkUriPattern('cms/*'), 'menu-open') }}">
          <a href="#" class="nav-link {{ active_class(Active::checkUriPattern('cms/*')) }}">
            <i class="nav-icon fa fa-pie-chart"></i>
            <p>
              CMS
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('cms/users*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.workflow.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('cms/workflow*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Workflow
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.category.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('cms/category*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.buildup.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('cms/buildup*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Buildup</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.department.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('cms/department*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Department</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.company.index') }}" class="nav-link {{ active_class(Active::checkUriPattern('cms/company*')) }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Company</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- @endrole --}}

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-lightbulb-o"></i>
            <p>
              Ideation
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('stages.ideas.create') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add Ideas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('stages.ideas.index') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ideas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/buttons.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Scoring</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/sliders.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Prioritization</p>
              </a>
            </li>
          </ul>
        </li>

         <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-file-text-o"></i>
            <p>
              Feasibility
            </p>
          </a>
        </li>

         <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-gear"></i>
            <p>
              Development
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-commenting-o"></i>
            <p>
              Test Launch
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-space-shuttle"></i>
            <p>
              Full Launch
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>

  {{-- test --}}
  <!-- /.sidebar -->
</aside>