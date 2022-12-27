@extends('layouts.user_type.auth')

@section('content')
    @include('flash-message')



    <div class="container-fluid">
        <div class="pb-5">
        </div>
        <div class="card card-body blur shadow-blur mx-0 mt-n6 mb-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('storage/' . $univInfo->logo) }}" alt="..."
                            class="w-100 border-radius-lg shadow-sm" style="border-radius: 50%;">
                        <a href="#edit{{ $univInfo->id }}" data-bs-toggle="modal"
                            class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" title="Edit Image"></i>
                        </a>
                    </div>
                </div>



                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $univInfo->university }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ __('Admin') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item" id="showTable1">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="overview" aria-selected="true">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>document</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="document" transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background"
                                                            d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                            id="Path" opacity="0.603585379"></path>
                                                        <path class="color-background"
                                                            d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"
                                                            id="Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Feed') }}</span>
                                </a>
                            </li>
                            <li class="nav-item" id="showTable2">
                                <a class="nav-link mb-0 px-0 py-1 active" href="javascript:;" data-bs-toggle="tab"
                                    role="tab" aria-controls="teams" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background"
                                                            d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"
                                                            id="Path"></path>
                                                        <path class="color-background"
                                                            d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                            id="Path" opacity="0.7"></path>
                                                        <path class="color-background"
                                                            d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                            id="Path" opacity="0.7"> </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Gallery') }}</span>
                                </a>
                            </li>
                            <li class="nav-item" id="showTable3">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="dashboard" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 46 42"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>customer-support</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                                        <path class="color-background"
                                                            d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                            id="Path" opacity="0.59858631"></path>
                                                        <path class="color-foreground"
                                                            d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                            id="Path"></path>
                                                        <path class="color-foreground"
                                                            d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                            id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('User') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Request Table-->

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id=table1>
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="card-header pb-0">
                                <h6>Pending Post Request</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    User</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Title/Content</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Pending</th>
                                                <th></th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($requests))
                                                @foreach ($requests as $request)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">

                                                                @foreach ($users as $user)
                                                                    @if ($request->user->id == 1)
                                                                        <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                                            class="avatar avatar-circle me-3"
                                                                            style="border-radius: 50%" alt="user1">
                                                                    @break

                                                                @else
                                                                    @foreach ($user->alumnis as $alumni)
                                                                        @if ($request->user->id == $alumni->id && $request->user->id != 1)
                                                                            <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                                                class="avatar avatar-circle me-3"
                                                                                style="border-radius: 50%"
                                                                                alt="user1">
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $request->user->name }}
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $request->user->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold  mb-0">
                                                        {{ $request->title }}
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">{!! nl2br($request->content) !!}
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">Posted:
                                                        {{ \Carbon\Carbon::parse($request->updated_at)->diffForHumans() }}
                                                    </p>
                                                </td>
                                                <!-- Delete and Approve Button-->
                                                <td class="align-middle text-center">
                                                    <div class="row">
                                                        <div class="card-body p-3">
                                                            <div class="row">
                                                                <div class="numbers">
                                                                    <button class="btn btn-success"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#approveModal{{ $request->id }}">
                                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                                            style="font-size:13px; width:50px; margin: auto">
                                                                            Approve</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="row">
                                                        <div class="card-body p-3">
                                                            <div class="row">
                                                                <div class="numbers">
                                                                    <button class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal{{ $request->id }}">
                                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                                            style="font-size:13px; width:70px;">
                                                                            Disapprove</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>
                                                @if (count($requests))
                                                    <!-- Modal For Disapprove Post Request-->
                                                    <div class="modal fade" id="deleteModal{{ $request->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="modalForDelete" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div style="center-align">
                                                                        <h5 class="modal-title"
                                                                            id="modalForDelete">Delete Post</h5>
                                                                    </div>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('dashboard.delete', $request->id) }}"
                                                                    id="editForm" accept-charset="UTF-8"
                                                                    style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <h5>Are you sure you want to delete this
                                                                            pending post?</h5>
                                                                        <h5>Title: {{ $request->title }}</h5>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="#"><button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button></a>
                                                                        <a href="dashboard"><button type="submit"
                                                                                title="Delete Request"
                                                                                class="btn btn-danger">Yes</button></a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                        </div>

                        <!-- Modal For Approving Post Request-->
                        <div class="modal fade" id="approveModal{{ $request->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="modalForApproval" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div style="center-align">
                                            <h5 class="modal-title" id="modalForDelete">Approve Post</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('dashboard.approve', $request->id) }}">
                                        {!! csrf_field() !!}
                                        <div class="modal-body">
                                            <h5>Are you sure you want to approve this pending post?</h5>
                                            <h5>Title: {{ $request->title }}</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="dasboard"><button button type="submit"
                                                    class="btn btn-success">Yes</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <td>
                        <p></p>
                    </td>
                    </tr>
                    @endforeach
                @else
                    <p class="text-sm mb-2 fst-italic" style="text-align: center;">No Feed
                        Request Found</p>
                    @endif
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>





<!-- Pending Gallery Request -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body px-0 pt-0 pb-2" id=table2 style="display: none;">
                    <div class="card-header pb-0">
                        <h6>Pending Gallery Request</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            User</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Image/Content</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pending</th>
                                        <th></th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($galleries))
                                        @foreach ($galleries as $gallery)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">


                                                        @foreach ($users as $user)
                                                            @if ($gallery->user->id == 1)
                                                                <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                                    class="avatar avatar-circle me-3"
                                                                    style="border-radius: 50%" alt="user1">
                                                            @break

                                                        @else
                                                            @foreach ($user->alumnis as $alumni)
                                                                @if ($gallery->user->id == $alumni->id && $gallery->user->id != 1)
                                                                    <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                                        class="avatar avatar-circle me-3"
                                                                        style="border-radius: 50%"
                                                                        alt="user1">
                                                                @break
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach


                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $gallery->user->name }}
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $gallery->user->email }}</p>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ \Carbon\Carbon::parse($gallery->updated_at)->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                                width="200" height="300">
                                        </td>

                                        <!-- Delete and Approve Button-->
                                        <td class="align-middle text-center">
                                            <div class="row">
                                                <div class="card-body p-3">
                                                    <div class="row">
                                                        <div class="numbers">
                                                            <button class="btn btn-success"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#approveGalleryModal{{ $gallery->id }}">
                                                                <p class="font-weight-bolder mb-0 text-capitalize"
                                                                    style="font-size:13px; width:50px; margin: auto">
                                                                    Approve</p>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="row">
                                                <div class="card-body p-3">
                                                    <div class="row">
                                                        <div class="numbers">
                                                            <button class="btn btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteGalleryModal{{ $gallery->id }}">
                                                                <p class="font-weight-bolder mb-0 text-capitalize"
                                                                    style="font-size:13px; width:70px;">
                                                                    Disapprove</p>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>

                                        @if (count($galleries))
                                            <!-- Modal For Disapprove Gallery Post Request-->
                                            <div class="modal fade"
                                                id="deleteGalleryModal{{ $gallery->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modalForGalleryDelete"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div style="center-align">
                                                                <h5 class="modal-title"
                                                                    id="modalForGalleryDelete">Delete
                                                                    Gallery Post</h5>
                                                            </div>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('dashboard.deleteGallery', $gallery->id) }}"
                                                            id="editForm" accept-charset="UTF-8"
                                                            style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <h5>Are you sure you want to delete this
                                                                    pending gallery post?
                                                                    {{ $gallery->id }}</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#"><button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button></a>
                                                                <a href="#"><button type="submit"
                                                                        title="Delete Request"
                                                                        class="btn btn-danger">Yes</button></a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                </div>

                <!-- Modal For Approving Gallery Post Request-->
                <div class="modal fade" id="approveGalleryModal{{ $gallery->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="modalForGalleryApproval" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div style="center-align">
                                    <h5 class="modal-title" id="modalForGalleryApproval">Approve Gallery
                                        Post</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST"
                                action="{{ route('dashboard.approveGallery', $gallery->id) }}">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <h5>Are you sure you want to approve this pending gallery post?
                                        {{ $gallery->id }}</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <a href="dasboard"><button button type="submit"
                                            class="btn btn-success">Yes</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            <td>
                <p></p>
            </td>
            </tr>
            @endforeach
            </tbody>
        @else
            <p class="text-sm mb-2 fst-italic" style="text-align: center;">No Gallery Request
                Found</p>
            @endif
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<!-- User/Alumni Registration Request -->
<div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2" id=table3 style="display: none;">
            <div class="card-header pb-0">
                <h6>Pending User Registration</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    User</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Title/Number</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    University</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Course</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Gender</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Address</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Civil Status</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Birthday</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Business/Job</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Business/Job Address</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    High School</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    High School Year Graduated</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Senior High School</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Senior High School Graduated</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    College Batch</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    NickName</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Proof of Identification</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Pending</th>
                                <th></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($nalumnis))
                                @foreach ($nalumnis as $alumniReg)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">


                                                @foreach ($users as $user)
                                                    @if ($alumniReg->user->id == 1)
                                                        <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                            class="avatar avatar-circle me-3"
                                                            style="border-radius: 50%" alt="user1">
                                                    @break

                                                @else
                                                    @foreach ($user->alumnis as $alumni)
                                                        @if ($alumniReg->user->id == $alumni->id && $alumniReg->user->id != 1)
                                                            <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                                class="avatar avatar-circle me-3"
                                                                style="border-radius: 50%"
                                                                alt="user1">
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach


                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $alumniReg->full_name }}
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                {{ $alumniReg->email_address }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->title }}
                                    </p>
                                    <p class="text-xs text-secondary mb-0">
                                        (+63)
                                        {{ $alumniReg->contact_number }}</p>
                                </td>

                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->university }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->courses_id }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->gender }}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->address }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->civil_status }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->birthday }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->job_business }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->business_address }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->high_school }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">
                                        {{ $alumniReg->high_school_yg }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->senior_highschool }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">
                                        {{ $alumniReg->senior_highschool_yg }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">
                                        {{ $alumniReg->college_batch }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $alumniReg->nickname }}</p>
                                </td>

                                <td class="align-middle text-center">
                                    <div class="row">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="numbers">
                                                    <button class="btn btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewId{{ $alumniReg->id }}">
                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                            style="font-size:13px; width:50px; margin: auto">
                                                            View Id</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </td>

                                <!-- Modal For Viewing Alumni Registration ID-->
                                <div class="modal fade" id="viewId{{ $alumniReg->id }}"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="modalForViewing" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div style="center-align">
                                                    <h5 class="modal-title" id="modalForViewing">
                                                        User Registration ID</h5>
                                                </div>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    
                                                    <br><br>
                                                    <div class="col-md-6" style="text-align: center;">
                                                        <p class="text-sm text-bold mb-0">
                                                            Identification Card: {{ $alumniReg->full_name }}
                                                            <img src="{{ asset('storage/' . $alumniReg->proof_of_identification) }}"
                                                                class="img-thumbnail mt-3"
                                                                style="border-radius: 5%"
                                                                alt="user1">
                                                        </p>
                                                    </div>
                                                    <br><br>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Delete and Approve Button-->
                                <td class="align-middle text-center">
                                    <div class="row">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="numbers">
                                                    <button class="btn btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#approveAlumniModal{{ $alumniReg->id }}">
                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                            style="font-size:13px; width:50px; margin: auto">
                                                            Approve</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="numbers">
                                                    <button class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteAlumniModal{{ $alumniReg->id }}">
                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                            style="font-size:13px; width:70px;">
                                                            Disapprove</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </td>

                                @if (count($nalumnis))
                                    <!-- Modal For Disapprove Alumni User Request-->
                                    <div class="modal fade"
                                        id="deleteAlumniModal{{ $alumniReg->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modalForAlumniDelete"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div style="center-align">
                                                        <h5 class="modal-title"
                                                            id="modalForAlumniDelete">Delete Alumni
                                                            User</h5>
                                                    </div>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('dashboard.deleteAlumni', $alumniReg->id) }}"
                                                    id="editForm" accept-charset="UTF-8"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <h5>Are you sure you want to delete this
                                                            pending alumni/user?</h5>
                                                        <h5>Name: {{ $alumniReg->full_name }}</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#"><button type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button></a>
                                                        <a href="#"><button type="submit"
                                                                title="Delete Request"
                                                                class="btn btn-danger">Yes</button></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
        </div>

        <!-- Modal For Approving Alumni User Request-->
        <div class="modal fade" id="approveAlumniModal{{ $alumniReg->id }}" tabindex="-1"
            role="dialog" aria-labelledby="modalForAlumniApproval" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="center-align">
                            <h5 class="modal-title" id="modalForAlumniApproval">Approve Alumni
                                User</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST"
                        action="{{ route('dashboard.approveAlumni', $alumniReg->id) }}">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <h5>Are you sure you want to approve this pending alumni/user?</h5>
                            <h5>Name: {{ $alumniReg->full_name }}</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <a href="#"><button button type="submit"
                                    class="btn btn-success">Yes</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <td>
        <p></p>
    </td>
    </tr>
    @endforeach
    </tbody>
@else
    <p class="text-sm mb-2 fst-italic" style="text-align: center;">No User/Alumni
        Request
        Found</p>
    @endif
    </table>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Edit Logo Modal -->
<div class="modal fade" id="edit{{ $univInfo->id }}" tabindex="-1" aria-labelledby="modalForEdit"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<div style="center-align">
    <h5 class="modal-title" id="modalForEdit">Upload New Logo</h5>
</div>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form method="POST" action="{{ route('logo.update', $univInfo->id) }}"
    enctype="multipart/form-data">
    {!! csrf_field() !!}
    @method('PATCH')
    <div class="row">
        <div class="my-2">
            <input type="file" name="logo" class="form-control" accept="logo/*">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="modal-footer">
<a href="#"><button type="button" class="btn btn-secondary"
        data-bs-dismiss="modal">Close</button></a>
<a href="#"><button type="submit" class="btn btn-success">Update and
        save changes</button></a>
</form>
</div>
</div>
</div>
</div>









<script>
    var table1 = document.getElementById("table1");
    var table2 = document.getElementById("table2");
    var table3 = document.getElementById("table3");

    var btnTab1 = document.getElementById("showTable1");
    var btnTab2 = document.getElementById("showTable2");
    var btnTab3 = document.getElementById("showTable3");

    btnTab1.onclick = function() {
        var op = 0.1; // initial opacity
        table1.style.display = 'block';
        var timer = setInterval(function() {
            if (op >= 1) {
                clearInterval(timer);
            }
            table1.style.opacity = op;
            table1.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op += op * 0.1;
        }, 10);

        table1.style.display = "table";
        table2.style.display = "none";
        table3.style.display = "none";
    }

    btnTab2.onclick = function() {
        var op = 0.1; // initial opacity
        table2.style.display = 'block';
        var timer = setInterval(function() {
            if (op >= 1) {
                clearInterval(timer);
            }
            table2.style.opacity = op;
            table2.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op += op * 0.1;
        }, 10);

        table1.style.display = "none";
        table2.style.display = "table";
        table3.style.display = "none";
    }

    btnTab3.onclick = function() {
        var op = 0.1; // initial opacity
        table3.style.display = 'block';
        var timer = setInterval(function() {
            if (op >= 1) {
                clearInterval(timer);
            }
            table3.style.opacity = op;
            table3.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op += op * 0.1;
        }, 10);

        table1.style.display = "none";
        table2.style.display = "none";
        table3.style.display = "table";

    }
</script>

</main>
@endsection

@push('dashboard')
@endpush
