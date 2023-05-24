        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="{{ route('admin.dashboard') }}" title="Admin Dashboard">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33">
                  <g fill="none" fill-rule="evenodd">
                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>

                <span class="brand-name text-truncate">Admin Dashboard</span>
              </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar" style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner mb-3" id="sidebar-menu">
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                    aria-expanded="false" aria-controls="dashboard">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text">Home</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="dashboard" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('sliders.admin') }}">
                          <span class="nav-text">All Sliders</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('about.admin') }}">
                          <span class="nav-text">About Section</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('services.admin') }}">
                          <span class="nav-text">Main Services</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('multi.image') }}">
                          <span class="nav-text">Photo Gallery</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('brands') }}">
                          <span class="nav-text">Brands</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
                    aria-expanded="false" aria-controls="app">
                    <i class="mdi mdi-pencil-box-outline"></i>
                    <span class="nav-text">About Us</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="app" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.team') }}">
                          <span class="nav-text">Our Team</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.skills') }}">
                          <span class="nav-text">Skills</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.tes') }}">
                          <span class="nav-text">Testimonials</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <!-- <li class="section-title">
                  UI Elements
                </li> -->

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                    aria-expanded="false" aria-controls="icons">
                    <i class="mdi mdi-diamond-stone"></i>
                    <span class="nav-text">Services</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="icons" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.services.features') }}">
                          <span class="nav-text">Features</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tables"
                    aria-expanded="false" aria-controls="tables">
                    <i class="mdi mdi-table"></i>
                    <span class="nav-text">Pricing</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="tables" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.pricing') }}">
                          <span class="nav-text">Prices</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.faq') }}">
                          <span class="nav-text">FAQ</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <!-- <li class="section-title">
                  Pages
                </li> -->

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                    aria-expanded="false" aria-controls="pages">
                    <i class="mdi mdi-image-filter-none"></i>
                    <span class="nav-text">Blog</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="pages" data-parent="#sidebar-menu">
                    <div class="sub-menu ">
                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.authorship') }}">
                          <span class="nav-text">Authors</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.articles') }}">
                          <span class="nav-text">Articles</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.comments') }}">
                          <span class="nav-text">Comments</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('categories') }}">
                          <span class="nav-text">Categories</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.tags') }}">
                          <span class="nav-text">Tags</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms"
                    aria-expanded="false" aria-controls="forms">
                    <i class="mdi mdi-email-mark-as-unread"></i>
                    <span class="nav-text">Contact Page</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="forms" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.contact') }}">
                          <span class="nav-text">Contact Profile</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.messages') }}">
                          <span class="nav-text">Contact Messages</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <!-- <li class="section-title">
                  Documentation
                </li> -->
              </ul>
            </div>

            <div class="sidebar-footer">
              <hr class="separator mb-0" />
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                  Cpu Uses <span class="float-right">40%</span>
                </h6>

                <div class="progress progress-xs">
                  <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                </div>

                <h6 class="text-uppercase">
                  Memory Uses <span class="float-right">65%</span>
                </h6>

                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar"></div>
                </div>
              </div>
            </div>
          </div>
        </aside>