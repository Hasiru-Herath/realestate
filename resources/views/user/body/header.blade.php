<style>
        .navbar {
            width: 70%;
            margin-left: 0;
            padding-left: 0;
        }
        .container {
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>


<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
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
                    <a href="{{ route('agent.profile') }}" class="text-body ms-0">
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
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="{{ route('admin.logout') }}" class="text-body ms-0">
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