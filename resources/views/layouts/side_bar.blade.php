  <nav class="page-sidebar" id="sidebar">
      <div id="sidebar-collapse">
          <div class="admin-block d-flex">
              <div>
                  <img src="/assets/img/admin-avatar.png" width="45px" />
              </div>
              <div class="admin-info">
                  <div class="font-strong">RAZIB HASAN</div><small>Administrator</small>
              </div>
          </div>
          <ul class="side-menu metismenu">
              <li>
                  <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                      <span class="nav-label">Dashboard</span>
                  </a>
              </li>
              <li class="heading">FEATURES</li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-money"></i>
                      <span class="nav-label">Currencies</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="{{url('/currencies/create')}}">
                            Create Currencies</a>
                      </li>
                      <li>
                          <a href="{{url('/currencies')}}">
                            Manage Currencies</a>
                      </li>
                      <li>
                          <a href="{{url('product_categories/create')}}">
                            Create Category</a>
                      </li>
                      <li>
                          <a href="{{url('product_categories')}}">
                            Manage Category</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-university"></i>
                      <span class="nav-label">Money Stock</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="{{url('/money_stocks/create')}}">
                            Create Money Stock</a>
                      </li>
                      <li>
                          <a href="{{url('/money_stocks')}}">
                            Manage Money Stock</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-credit-card"></i>
                      <span class="nav-label">Transactions</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="{{url('/transactions/create')}}">Create Transactions</a>
                      </li>
                      <li>
                          <a href="{{url('/transactions')}}">Manage Transactions</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-paypal"></i>
                      <span class="nav-label">Payments</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="{{url('/payments/create')}}">Create Payments</a>
                      </li>
                      <li>
                          <a href="{{ url('/payments') }}">Manage Payments</a>
                      </li>
                      <li>
                          <a href="chartjs.html">Chart.js</a>
                      </li>
                      <li>
                          <a href="charts_sparkline.html">Sparkline Charts</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-product-hunt"></i>
                      <span class="nav-label">Purchase</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="{{url('/purchases/create')}}">Create Purchase</a>
                      </li>
                      <li>
                          <a href="{{url('/purchases')}}">Manage Purchase</a>
                      </li>
                  </ul>
              </li>
              {{-- <li>
                  <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                      <span class="nav-label">Icons</span>
                  </a>
              </li>
              <li class="heading">PAGES</li> --}}
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-gg-circle"></i>
                      <span class="nav-label">Accounts</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="{{url('/money_receipts/create')}}">Create MR</a>
                      </li>
                      <li>
                          <a href="{{url("/money_receipts")}}">Manage MR</a>
                      </li>
                      <li>
                          <a href="mail_compose.html">Compose mail</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                      <span class="nav-label">Calendar</span>
                  </a>
              </li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                      <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="invoice.html">Invoice</a>
                      </li>
                      <li>
                          <a href="profile.html">Profile</a>
                      </li>
                      <li>
                          <a href="login.html">Login</a>
                      </li>
                      <li>
                          <a href="register.html">Register</a>
                      </li>
                      <li>
                          <a href="lockscreen.html">Lockscreen</a>
                      </li>
                      <li>
                          <a href="forgot_password.html">Forgot password</a>
                      </li>
                      <li>
                          <a href="error_404.html">404 error</a>
                      </li>
                      <li>
                          <a href="error_500.html">500 error</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                      <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                  <ul class="nav-2-level collapse">
                      <li>
                          <a href="javascript:;">Level 2</a>
                      </li>
                      <li>
                          <a href="javascript:;">
                              <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                          <ul class="nav-3-level collapse">
                              <li>
                                  <a href="javascript:;">Level 3</a>
                              </li>
                              <li>
                                  <a href="javascript:;">Level 3</a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
