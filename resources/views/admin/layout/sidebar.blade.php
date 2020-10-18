<div class="page-sidebar-wrapper">
  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
  <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
      <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
      <li class="sidebar-toggler-wrapper">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
      </li>
      <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
      <li class="sidebar-search-wrapper hidden-xs">
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
        <form class="sidebar-search" action="extra_search.html" method="POST">
          <a href="javascript:;" class="remove">
          <i class="icon-close"></i>
          </a>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
            </span>
          </div>
        </form>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
      </li>
      <li class="start" id="dashboard">
        <a href="{{ url('admin/dashboard') }}">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
        </a>
      </li>
      <li class="" id="category">
          <a href="javascript:;" id="link">
          <i class="icon-settings"></i>
          <span class="title">Categories</span>
          <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li id="list-category">
              <a href="{{ url('admin/categories/list') }}">
              List</a>
            </li>
            <li id="add-category">
              <a href="{{ url('admin/categories/create') }}">
              Create</a>
            </li>
          </ul>
      </li>
      <li class="" id="sub-category">
          <a href="javascript:;" id="link">
          <i class="icon-settings"></i>
          <span class="title">Sub Categories</span>
          <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li id="list-sub-category">
              <a href="{{ url('admin/sub-categories/list') }}">
              List</a>
            </li>
            <li id="add-sub-category">
              <a href="{{ url('admin/sub-categories/create') }}">
              Create</a>
            </li>
          </ul>
      </li>
      <li class="" id="m-brands">
          <a href="javascript:;" id="link">
          <i class="icon-settings"></i>
          <span class="title">Brands</span>
          <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li id="list-brands">
              <a href="{{ url('admin/brands/list') }}">
              List</a>
            </li>
            <li id="add-brands">
              <a href="{{ url('admin/brands/create') }}">
              Create</a>
            </li>
          </ul>
      </li>
      <li class="" id="products">
          <a href="javascript:;" id="link">
          <i class="icon-settings"></i>
          <span class="title">Products</span>
          <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li id="list-products">
              <a href="{{ url('admin/products/list') }}">
              List</a>
            </li>
            <li id="add-products">
              <a href="{{ url('admin/products/create') }}">
              Create</a>
            </li>
          </ul>
      </li>
      <li class="" id="products">
          <a href="javascript:;" id="link">
          <i class="icon-settings"></i>
          <span class="title">Customers</span>
          <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li id="list-products">
              <a href="{{ url('admin/customers/list') }}">
              List</a>
            </li>
          </ul>
      </li>
      <li class="" id="products">
          <a href="javascript:;" id="link">
          <i class="icon-settings"></i>
          <span class="title">Orders</span>
          <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li id="list-products">
              <a href="{{ url('admin/orders/list') }}">
              List</a>
            </li>
          </ul>
      </li>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>