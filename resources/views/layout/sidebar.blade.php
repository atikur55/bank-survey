<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{url('/home')}}" class="sidebar-brand">
      <!-- Noble<span>UI</span> -->
      @php
      $get_logo = App\AppInfo::where('status',1)->first();
      @endphp
      <img src="{{asset('uploads/applogo/')}}/{{$get_logo->app_logo??''}}" width="80px;">
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- Admin Dashboard -->
  @if(Auth::user()->role == 1)
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <!-- <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/category') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Add Category</span>
        </a>
      </li> -->
    <!--   <li class="nav-item nav-category">web apps</li>
      <li class="nav-item {{ active_class(['email/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Question</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['email/*']) }}" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="#" class="nav-link {{ active_class(['email/inbox']) }}">Add Question</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ active_class(['email/read']) }}">View Answer</a>
            </li>
          </ul>
        </div>
      </li> -->
    <!--   <li class="nav-item nav-category">Survey</li>
      <li class="nav-item @yield('bank')">
        <a class="nav-link" data-toggle="collapse" href="#bank" role="button" aria-expanded="{{ is_active_route(['bank/*']) }}" aria-controls="bank">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Bank</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['bank/*']) }}" id="bank">
          <ul class="nav sub-menu">
            <li class="nav-item">
   
             <a href="{{url('bank/home')}}" class="nav-link {{ active_class(['bank/inbox']) }}">Survey</a>
    
            </li>
     
          </ul>
        </div>
      </li> -->
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/users') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Users</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/banks') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Bank</span>
        </a>
      </li>
      <li class="nav-item @yield('admin')">
        <a href="{{ url('/admin') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Admin</span>
        </a>
      </li>
      <li class="nav-item @yield('appinfo')">
        <a href="{{ url('/appinfo') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">App Info</span>
        </a>
      </li>
      <!-- -------------- Zone  ------------------------ -->
      <!-- <li class="nav-item @yield('zone')">
        <a href="{{ url('/zone') }}" class="nav-link">

          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Create Zone</span>
        </a>
      </li> -->
      <li class="nav-item @yield('czone')">
        <a class="nav-link" data-toggle="collapse" href="#czone" role="button" aria-expanded="" aria-controls="czone">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Create Zone</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="czone">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/create_zone') }}" class="nav-link">Create</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/zone_view') }}" class="nav-link">View</a>
            </li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item @yield('zone')">
        <a class="nav-link" data-toggle="collapse" href="#zone" role="button" aria-expanded="" aria-controls="zone">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Create Area</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="zone">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/zone') }}" class="nav-link">Create</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/view_zone') }}" class="nav-link">View</a>
            </li>
          {{--   <li class="nav-item">
              <a href="{{ url('/import-excel') }}" class="nav-link">File Upload CS</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/import-excel_ca') }}" class="nav-link">File Upload CA</a>
            </li> --}}
          </ul>
        </div>
      </li>
       <!-- -------------- End Zone  ------------------------ -->
      <li class="nav-item">
        <a href="{{ url('/import-excel') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">File Upload CS</span>
        </a>
      </li>
       <li class="nav-item">
        <a href="{{ url('/import-excel_ca') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">File Upload CA</span>
        </a>
      </li>

      <li class="nav-item @yield('assign_survey')">
        <a href="{{ url('/assign_survey') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Assign Survey</span>
        </a>
      </li>
      <li class="nav-item @yield('complete_files')">
        <a href="{{ url('/complete_files') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Complete Files</span>
        </a>
      </li>
      <li class="nav-item @yield('incomplete_files')">
        <a href="{{ url('/incomplete_files') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Incomplete Files</span>
        </a>
      </li>
     {{--  <li class="nav-item @yield('file_create')">
        <a href="{{ url('/file_create') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">File Create</span>
        </a>
      </li> --}}
      <!-- =================
              EIT Requirement
        =====================  --> 
      <!-- <li class="nav-item {@yield('cef')">
        <a href="{{ url('/view_enquiry') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Client Enquiry List</span>
        </a>
      </li> -->
      <!-- =================
             End EIT Requirement
        =====================  --> 
    </ul>
  </div>
  @elseif(Auth::user()->role == 2)
  <div class="sidebar-body">
    <ul class="nav">
      <!-- <li class="nav-item nav-category">Main</li> -->
      <li class="nav-item ">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Home</span>
        </a>
      </li>
      <li class="nav-item @yield('assign_survey')">
        <a href="{{ url('/assign_survey') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Assign Survey</span>
        </a>
      </li>
      <!-- =================
              EIT Requirement
        =====================  --> 
     <!--  <li class="nav-item @yield('cef')">
        <a href="{{ url('/cef') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Client Enquiry Form</span>
        </a>
      </li> -->
      <!-- =================
             End EIT Requirement
        =====================  --> 
      <!--  <li class="nav-item nav-category">Survey</li>
      <li class="nav-item {{ active_class(['bank/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#bank" role="button" aria-expanded="{{ is_active_route(['bank/*']) }}" aria-controls="bank">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Bank</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['bank/*']) }}" id="bank">
          <ul class="nav sub-menu">
            <li class="nav-item">
               <a href="{{url('bank/home')}}" class="nav-link {{ active_class(['bank/inbox']) }}">Survey</a>
           
            </li>
            
          </ul>
        </div>
      </li> -->
    </ul>
  </div>

  @else
  <!-- User Dashboard -->
  <div class="sidebar-body">
    <ul class="nav">
      <!-- <li class="nav-item nav-category">Main</li> -->
      <li class="nav-item ">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Home</span>
        </a>
      </li>
      <li class="nav-item @yield('list')">
        <a href="{{ url('/assign_list') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Assign List</span>
        </a>
      </li>
      <!-- =================
              EIT Requirement
        =====================  --> 
     <!--  <li class="nav-item @yield('cef')">
        <a href="{{ url('/cef') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Client Enquiry Form</span>
        </a>
      </li> -->
      <!-- =================
             End EIT Requirement
        =====================  --> 
      <!--  <li class="nav-item nav-category">Survey</li>
      <li class="nav-item {{ active_class(['bank/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#bank" role="button" aria-expanded="{{ is_active_route(['bank/*']) }}" aria-controls="bank">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Bank</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['bank/*']) }}" id="bank">
          <ul class="nav sub-menu">
            <li class="nav-item">
               <a href="{{url('bank/home')}}" class="nav-link {{ active_class(['bank/inbox']) }}">Survey</a>
           
            </li>
            
          </ul>
        </div>
      </li> -->
    </ul>
  </div>
  @endif
</nav>
