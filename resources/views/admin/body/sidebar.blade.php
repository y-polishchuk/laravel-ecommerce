<aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="{{ route('admin.dashboard') }}">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">Admin Dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li  class="has-sub active expand" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse show"  id="dashboard"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
<li  class="active" >
  <a class="sidenav-item-link" href="{{ route('sliders.admin') }}">
    <span class="nav-text">Home Slider</span>
    
  </a>
</li>
<li  class="active" >
  <a class="sidenav-item-link" href="{{ route('about.home') }}">
    <span class="nav-text">Home About</span>
    
  </a>
</li>
<li  class="active" >
  <a class="sidenav-item-link" href="{{ route('services.home') }}">
    <span class="nav-text">Home Services</span>
    
  </a>
</li>
<li  class="active" >
  <a class="sidenav-item-link" href="{{ route('multi.image') }}">
    <span class="nav-text">Home Portfolio</span>
    
  </a>
</li>
<li  class="active" >
  <a class="sidenav-item-link" href="{{ route('brands') }}">
    <span class="nav-text">Home Brand</span>
    
  </a>
</li>
                      </div>
                    </ul>
                  </li>
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#about"
                      aria-expanded="false" aria-controls="about">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">About Us</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="about"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.team') }}">
                          <span class="nav-text">Our Team</span>
                        </a>
                      </li>
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.skills') }}">
                          <span class="nav-text">Our Skills</span>
                        </a>
                      </li>
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.tes') }}">
                          <span class="nav-text">Testimonials</span>
                        </a>
                      </li>

                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#services"
                      aria-expanded="false" aria-controls="services">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Services</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="services"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.services.features') }}">
                          <span class="nav-text">Features</span>
                        </a>
                      </li>

                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pricing"
                      aria-expanded="false" aria-controls="pricing">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Pricing</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="pricing"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.pricing') }}">
                          <span class="nav-text">Prices</span>
                        </a>
                      </li>
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.faq') }}">
                          <span class="nav-text">FAQ</span>
                        </a>
                      </li>

                      </div>
                    </ul>
                  </li>


                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#blog"
                      aria-expanded="false" aria-controls="blog">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Blog</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="blog"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.authorship') }}">
                          <span class="nav-text">Authors</span>
                        </a>
                      </li>
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.articles') }}">
                          <span class="nav-text">Articles</span>
                        </a>
                      </li>
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.comments') }}">
                          <span class="nav-text">Comments</span>
                        </a>
                      </li>
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('categories') }}">
                          <span class="nav-text">Categories</span>
                        </a>
                      </li>
                      <li class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.tags') }}">
                          <span class="nav-text">Tags</span>
                        </a>
                      </li>
                      </div>
                    </ul>
                  </li>

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contact"
                      aria-expanded="false" aria-controls="contact">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Contact Page</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="contact"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.contact') }}">
                          <span class="nav-text">Contact Profile</span>
                        </a>
                      </li>
                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('admin.message') }}">
                          <span class="nav-text">Contact Message</span>
                        </a>
                      </li>

                      </div>
                    </ul>
                  </li>

                
              </ul>

            </div>

            <hr class="separator" />


          </div>
        </aside>