<style>
    .navbar {
        width: 85%;
        margin-left: 0;
        padding-left: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .container {
        width: 100%;
        padding: 0;
        margin: 0;
    }
    .navbar-brand {
    opacity: 1;
    font-size: 1.5rem;
    font-weight: 700;
    color: #000865;
    padding-left: 500px;
    margin: 0 15px;
    visibility: visible;
    -webkit-transition: opacity 0.5s ease;
    transition: opacity 0.5s ease;
    font-size: 30px;
    direction: ltr/*rtl:ignore*/;
    text-shadow: 0 0 1px white, /* light shadow */
                 0 0 10px rgba(0, 0, 0, 0.3), /* medium shadow */
                 0 0 15px rgba(0, 0, 0, 0.3); /* dark shadow */

}

    .navbar-content {
        display: flex;
        align-items: center;
    }
    .navbar-toggler {
        display: flex;
        align-items: center;
    }
    .navbar-brand span {
        color:white;
        font-weight: 700;
    }
    
</style>




<nav class="navbar">
        
  
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
        <div class="sidebar-header">
            <a href="#" class="navbar-brand">
                Real <span>Estate</span>
            </a>
        </div>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">							
							<div class="text" aria-labelledby="languageDropdown">               
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-lk" title="es" id="es"></i> <span class="ms-1"> Sri Lanka </span></a>
							</div>
            </li>
					
            @php
              $id=Auth::user()->id;
              $data=App\Models\User::find($id);
            @endphp

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="{{(!empty($profileData->photo))?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="{{(!empty($profileData->photo))?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="">
									</div>
									
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="{{ route('user.profile') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="{{ route('agent.change.password') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Change Password </span>
                    </a>
                  </li>
                  
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="{{ route('user.logout') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>