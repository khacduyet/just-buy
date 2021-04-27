<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('public/uploads/avatar')}}/{{Auth::user()->avatar}}" width="30" height="30" class="img-circle elevation-2" alt="User Image">
          <span class="hidden-xs">Account</span>
        </a>
        <ul class="dropdown-menu">
          <div class="">
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
              <h6 class="">{{Auth::user()->name}}</h6>
            </div>
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="{{asset('public/uploads/avatar')}}/{{Auth::user()->avatar}}" alt="User Avatar">
            </div>
            <div class="card-footer clearfix">
              <a href="{{route('edit-profile',['id'=>Auth::user()->id])}}" class="btn btn-xs btn-info float-left">Detail</a>
              <a href="{{route('logout')}}" class="btn btn-xs btn-danger float-right">Logout</a>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
      <img src="{{ asset('public/frontend/admin/dist/img/logo-2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/uploads/avatar')}}/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Website
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('11',explode(',',Auth::user()->role)))
          <li class="nav-item">
            <a href="{{route('list-about')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               About
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('12',explode(',',Auth::user()->role)))
          <li class="nav-item">
            <a href="{{route('list-service')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Services
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-admin')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-admin')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List admins</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('10',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Config
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list-config')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List configs</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('list-consultant') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Consult customer
                <span class="right badge badge-danger">{{$count_consul}}</span>
              </p>
            </a>
          </li>
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('2',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Customer management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list-customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order-customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List orders</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('3',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List categories</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('4',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List products</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('5',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Products Attributes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                   Attributes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('add-name-attr')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add new product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('list-attrName')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List products</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Attribute value
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('add-value-attr')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add new atribute</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('list-attrValue')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List attributes</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    List attributes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('list-attrProduct')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List product attributes</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('6',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-banner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-banner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List banners</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('7',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List blogs</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('9',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Constructions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-construction')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new construction</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-construction')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List constructions</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(in_array('1',explode(',',Auth::user()->role)) || in_array('8',explode(',',Auth::user()->role)))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Brands
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-brand')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-brand')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List brands</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
