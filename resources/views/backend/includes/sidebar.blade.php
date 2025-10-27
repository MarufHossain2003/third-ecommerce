  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/admin/dashboard') }}" class="brand-link">
          <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="Admin Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- SidebarSearch Form -->
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  @if (Auth::user()->role == 1)
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Category
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/category/list') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Category List</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ url('/admin/category/create') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add New Category</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Subcategory
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/sub-category/list') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Subcategory List</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ url('/admin/sub-category/create') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add Subcategory</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Products
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/product/list') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Product List</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ url('/admin/product/create') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add Product</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif


                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Orders
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('/admin/orders/all-orders') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All Orders</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('/admin/orders/pending-orders') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pending Orders</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ url('/admin/orders/confirmed-orders') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Confirmed Orders</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('/admin/orders/delivered-orders') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Deliver Orders</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('/admin/orders/cancelled-orders') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cancelled Orders</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  @if (Auth::user()->role == 1)
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Employee
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/employee-list') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Employee List</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/employee-create') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add New</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Settings
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/general-setting') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>General Settings</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/home-banner') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Home Banner</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/privacy-policy') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Privacy Policy</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      
                  @endif
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Authenticaton
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/logout') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Logout</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ url('/admin/credentials') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Credentials</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
