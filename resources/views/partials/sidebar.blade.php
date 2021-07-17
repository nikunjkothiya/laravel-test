<div class="vertical-menu" style="background-color: black !important;">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <!-- Admin show menu start -->

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li class="{{ request()->is('dashboard') || request()->is('blogs') || request()->is('blogs/*') ? 'mm-active' : '' }}">
                    <a href="{{ route('blogs.index') }}" class="{{ request()->is('blogs') || request()->is('blogs/*') ? 'active' : '' }} waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Blog</span>
                    </a>
                </li>
               

              {{--  <li class="{{ request()->is('blogs') || request()->is('blogs/*') ? 'mm-active' : '' }}" class="waves-effect">
                    <a href="{{  route('blogs.index') }}" class="{{ request()->is('blogs') || request()->is('blogs/*') ? 'active' : '' }} waves-effect">
                        <i class="bx bx-shopping-bag"></i>
                        <span>Blog</span>
                    </a>
                </li>  --}}

            </ul>
            <!-- Admin show menu end -->
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End