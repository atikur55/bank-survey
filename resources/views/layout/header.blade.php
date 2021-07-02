@if(Auth::user()->role == 1)
<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    
    <ul class="navbar-nav">
      <!-- Notification -->
      <li class="nav-item dropdown nav-notifications">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CA<i data-feather="bell"></i>
          <div class="indicator">
            <p style="margin: 4px 4px;color: red;">{{App\CABankStatement::where('status',1)->count()}}</p>
            <!-- <div class="circle"></div> -->
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
          <div class="dropdown-header d-flex align-items-center justify-content-between">
            <p class="mb-0 font-weight-medium"> New Notifications</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
          </div>
          <div class="dropdown-body">
            @foreach(App\CABankStatement::orderBy('id','desc')->get() as $notification)
            <a href="{{url('update_ca_notification_file')}}/{{$notification->id}}" class="dropdown-item" style="{{$notification->status == 1 ? 'background: #FBFCBD;':''}}">
              <div class="icon">
                <i data-feather="file"></i>
              </div>
              <div class="content">
                <p>File Name: {{$notification->file_name}}</p>
                <p class="sub-text text-muted">
                  {{\Carbon\Carbon::parse($notification->date)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'))}} days ago
                </p>
              </div>
            </a>
            @endforeach
          </div>
          <div class="dropdown-footer d-flex align-items-center justify-content-center">
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li>
       <!-- End Notification -->
      <!-- Notification -->
      <li class="nav-item dropdown nav-notifications">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CS<i data-feather="bell"></i>
          <div class="indicator">
            <p style="margin: 4px 4px;color: red;">{{App\BankStatement::where('status',1)->count()}}</p>
            <!-- <div class="circle"></div> -->
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
          <div class="dropdown-header d-flex align-items-center justify-content-between">
            <p class="mb-0 font-weight-medium"> New Notifications</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
          </div>
          <div class="dropdown-body">
            @foreach(App\BankStatement::orderBy('id','desc')->get() as $notification)
            <a href="{{url('update_notification_file')}}/{{$notification->id}}" class="dropdown-item" style="{{$notification->status == 1 ? 'background: #FBFCBD;':''}}">
              <div class="icon">
                <i data-feather="file"></i>
              </div>
              <div class="content">
                <p>File Name: {{$notification->file_name}}</p>
                <p class="sub-text text-muted">
                  {{\Carbon\Carbon::parse($notification->date)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'))}} days ago
                </p>
              </div>
            </a>
            @endforeach
            {{-- @foreach(App\EmployeeDetails::where('status',1)->orderBy('id','desc')->get() as $notification)
            <a href="{{url('update_assign_file')}}/{{$notification->id}}" class="dropdown-item" style="{{$notification->notification == 0 ? 'background: #FBFCBD;':''}}">
              <div class="icon">
                <i data-feather="file"></i>
              </div>
              <div class="content">
                <p>File Name: {{$notification->file_name}}</p>
                <p class="sub-text text-muted">
                  {{\Carbon\Carbon::parse($notification->date)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'))}} days ago
                </p>
              </div>
            </a>
            @endforeach --}}
          </div>
          <div class="dropdown-footer d-flex align-items-center justify-content-center">
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li>
       <!-- End Notification -->
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
            </div>
            <div class="info text-center">
              <p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
              <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
             <!--  <li class="nav-item">
                <a href="{{ url('/general/profile') }}" class="nav-link">
                  <i data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('editprofile')}}" class="nav-link">
                  <i data-feather="edit"></i>
                  <span>Edit Profile</span>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="javascript:;" class="nav-link">
                  <i data-feather="repeat"></i>
                  <span>Switch User</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
@else
<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    
    <ul class="navbar-nav">
       <li class="nav-item dropdown nav-notifications">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="bell"></i>
          <div class="indicator">
            <p style="margin: 4px 4px;color: red;">{{App\AssignSurvey::where('agent_name',Auth::id())->where('notification',0)->count()}}</p>
            <!-- <div class="circle"></div> -->
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
          <div class="dropdown-header d-flex align-items-center justify-content-between">
            <p class="mb-0 font-weight-medium"> New Notifications</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
          </div>
          <div class="dropdown-body">
            @foreach(App\AssignSurvey::where('agent_name',Auth::id())->where('notification',0)->get() as $notification)
            <a href="{{url('update_assign_file')}}/{{$notification->id}}" class="dropdown-item" style="{{$notification->notification == 0 ? 'background: #FBFCBD;':''}}">
              <div class="icon">
                <i data-feather="file"></i>
              </div>
              <div class="content">
                <p>File Name: {{$notification->filename}}</p>
                <p class="sub-text text-muted">
                  {{\Carbon\Carbon::parse($notification->date)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'))}} days ago
                </p>
              </div>
            </a>
            @endforeach
          </div>
          <div class="dropdown-footer d-flex align-items-center justify-content-center">
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
            </div>
            <div class="info text-center">
              <p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
              <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <!-- <li class="nav-item">
                <a href="{{ url('/general/profile') }}" class="nav-link">
                  <i data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('editprofile')}}" class="nav-link">
                  <i data-feather="edit"></i>
                  <span>Edit Profile</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="javascript:;" class="nav-link">
                  <i data-feather="repeat"></i>
                  <span>Switch User</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
@endif