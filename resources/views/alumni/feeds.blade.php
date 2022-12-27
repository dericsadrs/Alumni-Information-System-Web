@extends('alumni.layouts.user_type.auth')
@section('content')
@include('flash-message')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-7">
                <div class="card mb-3">
                    <div class="card-body px-0 pb-3">
                        <div class="card-body">
                            <div style="text-align: start;">

                                @if (Auth::id() == 1)
                                    <img src="{{ asset('storage/' . $univInfo->logo) }}" class="avatar avatar-circle me-3"
                                        style="border-radius: 50%" alt="user1">
                                @else
                                    <img src="{{ asset('storage/' . $currentUserProfile->image_path) }}"
                                        class="avatar avatar-circle me-3" style="border-radius: 50%" alt="user1">
                                @endif

                                <a href="{{ url('/feeds') }}" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#postModal">
                                    @if (Auth::id() == 1)
                                        What's on your mind, Admin?
                                    @else
                                        What's on your mind, {{ $currentUserProfile->nickname }}?
                                    @endif
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Loop for Post-->
        @if (count($feeds))
            @foreach ($feeds as $item)
                <div class="row" id="datatable">
                    <div class="col-7">
                        <div class="card mb-3">
                            <div class="card-body px-0 pb-3 pt-1">


                                <!-- Edit and Delete Button -->
                                @if (Auth::id() == $item->user_id)
                                <div class="col-lg-12 col-5 my-auto text-end">
                                    <div class="float-lg-end pe-4 pt-2">
                                        <a class="cursor-pointer" id="dropdownTable" style="text-align: right;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true">
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                            <li>
                                                <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                                    class="dropdown-item border-radius-md">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#destroy{{ $item->id }}" data-bs-toggle="modal"
                                                    class="dropdown-item border-radius-md">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif

                                <div class="d-flex px-2 py-1">
                                    @foreach ($users as $user)
                                        @if ($item->user->id == 1)
                                            <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                class="avatar avatar-circle me-3" style="border-radius: 50%" alt="user1">
                                        @break

                                    @else
                                        @foreach ($user->alumnis as $alumni)
                                            @if ($item->user->id == $alumni->id && $item->user->id != 1)
                                                <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                    class="avatar avatar-circle me-3" style="border-radius: 50%"
                                                    alt="user1">
                                            @break
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach



                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $item->user->name }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $item->user->email }}</p>
                                <p class="text-xs text-secondary mb-0">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</p>
                            </div>
                        </div>


                        <div class="card-header pb-0" style="text-align: center; ">
                            <h5>{{ $item->title }}</h5>
                            <div class="card-body">
                                <div>

                                    <p class="mb-0 text-sm">{!! nl2br($item->content) !!}</p>
                                </div>
                            </div>
                        </div>


                        <!-- Edit Modal -->
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modalForEdit" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div style="center-align">
                                            <h5 class="modal-title" id="modalForEdit">Edit Post</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('alumni.feeds.update', $item->id) }}"
                                            id="editForm">
                                            {!! csrf_field() !!}
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="control-group col-12">
                                                    <input type="text" class="form-control" name="title"
                                                        value="{{ $item->title }}" id="title"
                                                        placeholder="Enter Post Title" required>
                                                </div>
                                                <div class="control-group col-12 mt-2">
                                                    <label for="content">Content</label>
                                                    <textarea class="form-control" name="content" id="content" placeholder="Enter Post Body" rows="" required>{{ old('content', $item->content) }}</textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"> <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button></a>
                                        <a href="#"><button type="submit" value="POST"
                                                class="btn btn-success">Update and save changes</button></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="destroy{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modalForDestroy" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div style="center-align">
                                            <h5 class="modal-title" id="modalForDestroy">Delete Post</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('alumni.feeds.destroy', $item->id) }}"
                                        id="editForm" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <h4 class="text-center">Are you sure you want to this post?</h4>
                                            <h5 class="text-center">Name: {{ $item->title }}
                                                {{ $item->content }}
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#"><button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal"><i class="fa fa-times"></i>
                                                    Close</button></a>
                                            <button type="submit" class="btn btn-danger" title="Delete Post"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i> Yes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>

@endforeach
@else
<h2 class="text-center text-secondary p-4 mt-5">No Announcement found in the database!</h2>
@endif








<!-- Create Post Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="modalForPost" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div style="center-align">
                <h5 class="modal-title" id="modalForPost">Create Post</h5>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('alumni/feeds') }}" method="post">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="control-group col-12">
                        <label for="title">Post Title</label>
                        <input type="text" id="title" class="form-control" name="title"
                            placeholder="Enter Post Title" required>
                    </div>
                    <div class="control-group col-12 mt-2">
                        <label for="body">Content</label>
                        <textarea id="body" class="form-control" name="content" placeholder="Enter Post Body" rows="" required></textarea>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" value="Post" class="btn btn-success">Save changes</button>
            </form>
        </div>
    </div>
</div>
</div>







<div class="pb-5 pt-5">
</div>
<div class="col-4 card card-body blur shadow-blur mx-0 mt-n6 mb-3 " style="position: absolute; top: 250px; right: 50px;">
<div class="card-body px-0 pt-0 pb-2 text-center">
    <h5 class="mb-0">{{ \Carbon\Carbon::now()->translatedFormat('F') }} Celebrants!</h5>
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Birthday
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($celebrants))
                    @foreach ($celebrants as $celebrant)
                        <tr>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0"> {{ $celebrant->full_name }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">
                                    {{ \Carbon\Carbon::now()->translatedFormat('F') }}
                                    {{ substr($celebrant->birthday, -2) }}</p>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <p class="text-sm mb-2 fst-italic" style="text-align: center;">No Birthday Celebrants This
                        Month</p>
                @endif
            </tbody>
        </table>

    </div>
</div>
</div>

<div class="pb-5 pt-4">
</div>
<div class="col-4 card card-body blur shadow-blur mx-0 mt-n6 mb-3" style="position: absolute; top: 500px; right: 50px;">
<div class="card-body px-0 pt-0 pb-2 text-center">
    <h5 class="mb-0">List Of Courses Available!</h5>
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($courses))
                    @foreach ($courses as $course)
                        <tr>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0"> {{ $course->course }}</p>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p class="text-sm mb-2 fst-italic" style="text-align: center;">No Courses Available</p>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>





</main>
@endsection
