<!-- Sidebar -->
<div class="sidebar" id="sidebar">
   <!-- Logo -->
   <div class="sidebar-logo active">
      <a href="{{ route('dashboard') }}" class="logo logo-normal">
         <img src="{{asset('backend/assets/back-img/logo.png')}}" alt="Img">
      </a>
      <a href="{{ route('dashboard') }}" class="logo logo-white">
         <img src="{{asset('backend/assets/back-img/logo.png')}}" alt="Img">
      </a>
      <a href="{{ route('dashboard')}}" class="logo-small">
         <img src="{{asset('backend/assets/back-img/fav.png')}}" alt="Img">
      </a>
   </div>
   <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
         <ul>
            <li class="submenu-open">
               <ul>
                  <li class="active">
                     <a href="{{ route('dashboard') }}">
                        <i class="ti ti-layout-grid fs-16 me-2"></i>
                        <span>Dashboard</span>
                     </a>
                  </li>
                  <!-- <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-layout-grid-add fs-16 me-2"></i>
                        <span>Manage Menus</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('menus.index') }}">All Menus</a></li>
                        <li><a href="{{ route('menus.create') }}">Create Menu</a></li>
                     </ul>
                  </li> -->
                  <!-- <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-brand-apple-arcade fs-16 me-2"></i>
                        <span>Manage Pages</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('pages.index') }}">All Pages</a></li>
                        <li><a href="{{ route('pages.create') }}">Create Page</a></li>
                     </ul>
                  </li> -->
                  <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-file fs-16 me-2"></i>
                        <span>Manage Banner</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('manage-banner.index') }}">Banner</a></li>
                     </ul>
                  </li>
                  <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-military-award fs-16 me-2"></i>
                        <span>Manage Awards</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('manage-awards.index') }}">Awards</a></li>
                     </ul>
                  </li>  
                  <!-- <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-brand-blogger fs-16 me-2"></i>
                        <span>Manage Blog</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('manage-blog.index') }}">Blog</a></li>
                     </ul>
                  </li> -->
                  <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-brand-appgallery fs-16 me-2"></i>
                        <span>Manage Gallery</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('manage-gallery.index') }}">Gallery</a></li>
                     </ul>
                  </li>                
                  <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-brand-booking fs-16 me-2"></i>
                        <span>Manage Courses</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('manage-courses.index') }}">Courses</a></li>
                     </ul>
                  </li> 
                  <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-photo-video fs-16 me-2"></i>
                        <span>Manage Video</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('manage-video.index') }}">Video</a></li>
                     </ul>
                  </li>                
                   
                                
                  
                  

                  

               </ul>
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- /Sidebar -->