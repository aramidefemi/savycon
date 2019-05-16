          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                  <p>{{ access()->user()->name }}</p>
                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>

              <!-- search form (Optional) -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.search_placeholder') }}"/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->

              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
                <li class="header">{{ trans('menus.general') }}</li>

                <!-- Optionally, you can add icons to the links -->
                <li class="{{ Active::pattern('admin/dashboard') }}"><a href="{!!route('backend.dashboard')!!}"><span>{{ trans('menus.dashboard') }}</span></a></li>

                <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                  <a href="#">
                    <span>Site Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('/un-found-search') }}"><a href="{{ url("admin/un-found-search") }}"><span>Unfound Search</span></a></li>
                    <li class="{{ Active::pattern('/new-advert') }}"><a href="{{ url("admin/new-advert") }}"><span>New Advert</span></a></li>
                    <li>
                      <a href="{!! url('admin/delete/ad') !!}">Delete Ad</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/all/delete/ad') !!}">View Deleted Ad </a>
                    </li>
                    <li>
                      <a href="{!! url('admin/view/subscriber') !!}">View Subscriber</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/view/suggestion') !!}">View Suggestion</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/new/category') !!}">New Category</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/all/category') !!}">All Category</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/new/state') !!}">New State</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/all/state') !!}">All State</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/new/sub/state') !!}">New Sub-State</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/all/sub/state') !!}">All Sub-State</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/new/featured/ad') !!}">New Featured Advert</a>
                    </li>
                    <li>
                      <a href="{!! url('#') !!}">Featured Advert Setting</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/new/banner') !!}">New Banner Images</a>
                    </li>
                    <li>
                      <a href="{!! url('admin/all/banner/images') !!}">All Banner Images</a>
                    </li>
                  </ul>
                </li>

                @permission('view-access-management')
                  <li class="{{ Active::pattern('admin/access/*') }}"><a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.access_management') }}</span></a></li>
                @endauth
                
                
                
                
                
                
                
                
                
                
                
                
                
                <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <span>Share Adverts</span>
                    <i class="fa fa-share pull-right"></i>
                 </a>
                 <ul class="treeview-menu" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('/un-found-search') }}">
                    <a href="{{ url("admin/freelancer/share") }}"><span>Freelancer</span>
                    </a>
                    </li>
                    <li class="{{ Active::pattern('/un-found-search') }}">
                    <a href="{{ url("admin/buyer/share") }}"><span>Buyer</span>
                    </a>
                    </li>
                </ul>
                </li>
                
                
                
                
                
                
                
                
                
                
                
               
                 <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                  <a href="#">
                    <span>{{ trans('menus.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                      <a href="{!! url('admin/log-viewer') !!}">{{ trans('menus.log-viewer.dashboard') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                      <a href="{!! url('admin/log-viewer/logs') !!}">{{ trans('menus.log-viewer.logs') }}</a>
                    </li>
                  </ul>
                </li>

              </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>
