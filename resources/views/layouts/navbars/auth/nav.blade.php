<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                    {{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            @if (Auth::id() == 1)
                <h5 class="text-md text-dark active text-capitalize"
                    style="margin-right: 20px; margin-bottom: 5px; opacity: 0.5;">Hi, {{ $admin->name }} (Admin)</h5>
            @else
                <h5 class="text-md text-dark active text-capitalize"
                    style="margin-right: 20px; margin-bottom: 5px; opacity: 0.5;">Hi,
                    {{ $currentUserProfile->full_name }} (Alumni)</h5>
            @endif
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('/logout') }}" class="nav-link text-body font-weight-bold px-0">
                        <div class="nav-user-icon">
                            @if (Auth::id() != 1)
                                <i><img src="{{ asset('storage/' . $currentUserProfile->image_path) }}" height="50px"
                                        width="50px" style="border-radius: 50%;"></i>
                            @else
                                <i><img src="{{ asset('storage/' . $univInfo->logo) }}" height="50px" width="50px"
                                        style="border-radius: 50%;"></i>
                            @endif
                            <span class="d-sm-inline d-none" onclick="return confirm(&quot;Confirm Signout?&quot;)">Sign
                                Out</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (count($galleries) > 0 or count($requests) > 0 or count($nalumnis) > 0)
                        <i class="fa fa-bell cursor-pointer" style="color:#ea0606"></i>
                        @else
                        <i class="fa fa-bell cursor-pointer"></i>
                        @endif
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">

                        @foreach ($galleries as $gallery)
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="{{ url('dashboard') }}">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            
                                            @foreach ($users as $user)
                                            @if ($gallery->user->id == 1)
                                                <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                    class="avatar avatar-circle me-3" style="border-radius: 50%" alt="user1">
                                            @break
    
                                        @else
                                            @foreach ($user->alumnis as $alumni)
                                                @if ($gallery->user->id == $alumni->id && $gallery->user->id != 1)
                                                    <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                        class="avatar avatar-circle me-3" style="border-radius: 50%"
                                                        alt="user1">
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">Image Request</span> from
                                                {{ $gallery->user->name }}
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                {{ \Carbon\Carbon::parse($gallery->updated_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                        @foreach ($nalumnis as $alumni)
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="{{ url('dashboard') }}">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                class="avatar avatar-sm  me-3 " >
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New User Registration</span> from
                                                {{ $alumni->full_name }}
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                {{ \Carbon\Carbon::parse($alumni->updated_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                        @foreach ($requests as $request)
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="{{ url('dashboard') }}">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">

                                            @foreach ($users as $user)
                                            @if ($request->user->id == 1)
                                                <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                    class="avatar avatar-circle me-3" style="border-radius: 50%" alt="user1">
                                            @break
    
                                        @else
                                            @foreach ($user->alumnis as $alumni)
                                                @if ($request->user->id == $alumni->id && $request->user->id != 1)
                                                    <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                        class="avatar avatar-circle me-3" style="border-radius: 50%"
                                                        alt="user1">
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">Feed Request</span> from
                                                {{ $request->user->name }}
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                {{ \Carbon\Carbon::parse($request->updated_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        
                        @if (count($galleries) == 0 and count($requests) == 0 and count($nalumnis) == 0)
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">No Request/s Found in Database</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
