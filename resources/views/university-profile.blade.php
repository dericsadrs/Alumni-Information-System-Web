@extends('layouts.user_type.auth')

@section('content')
    @include('flash-message')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('University Profile Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('update.univProfile') }}" method="POST" role="form text-left">
                    {!! csrf_field() !!}
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="UniversityName" class="form-control-label">University Name</label>
                                <input class="form-control" value="{{ $univInfo->university }}" type="text"
                                    placeholder="University" id="university" name="university">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="UniversityMotto" class="form-control-label">Motto</label>
                                <input class="form-control" value="{{ $univInfo->motto }}" type="text"
                                    placeholder="motto" id="motto" name="motto">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('University Admin Name') }}</label>
                                <input class="form-control" value="{{ $users->first()->name }}" type="text"
                                    placeholder="Name" id="user-name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('University Email') }}</label>
                                <input class="form-control" value="{{ $users->first()->email }}" type="email"
                                    placeholder="@example.com" id="user-email" name="email">
                            </div>
                        </div>
                        
                    
                        
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ID Application Table-->
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="card-header pb-0">
                                <h6>Pending ID Application</h6>
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
                                                    Contact #/Address</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Pending</th>
                                                <th></th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($AlumniIdApplications))
                                                @foreach ($AlumniIdApplications as $IdApplication)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">


                                                                @foreach ($users as $user)
                                                                    @if ($IdApplication->user->id == 1)
                                                                        <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                                            class="avatar avatar-circle me-3"
                                                                            style="border-radius: 50%" alt="user1">
                                                                    @break

                                                                @else
                                                                    @foreach ($user->alumnis as $alumni)
                                                                        @if ($IdApplication->user->id == $alumni->id && $IdApplication->user->id != 1)
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
                                                            <h6 class="mb-0 text-sm">
                                                                {{ $IdApplication->user->name }}
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $IdApplication->user->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">(+63)
                                                        {{ $IdApplication->contact_number }}</p>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $IdApplication->address }}</p>
                                                </td>

                                                <!-- View Button-->
                                                <td class="align-middle text-center">
                                                    <div class="row">
                                                        <div class="card-body p-3">
                                                            <div class="row">
                                                                <div class="numbers">
                                                                    <button class="btn btn-success"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewIdApplication{{ $IdApplication->id }}">
                                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                                            style="font-size:13px; width:50px; margin: auto">
                                                                            View</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>

                                                <!-- Modal For Viewing ID Application-->
                                                <div class="modal fade"
                                                    id="viewIdApplication{{ $IdApplication->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modalForViewing"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="center-align">
                                                                    <h5 class="modal-title" id="modalForViewing">
                                                                        ID
                                                                        Application</h5>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Full
                                                                            Name:
                                                                            {{ $IdApplication->full_name }}</p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Address:
                                                                            {{ $IdApplication->address }}</p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Gender:
                                                                            {{ $IdApplication->gender }}</p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Contact
                                                                            Number: (+63)
                                                                            {{ $IdApplication->contact_number }}
                                                                        </p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">
                                                                            Educational
                                                                            Background:
                                                                            {{ $IdApplication->educational_bg }}
                                                                        </p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Civil
                                                                            Status:
                                                                            {{ $IdApplication->civil_status }}</p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">
                                                                            Job/Business:
                                                                            {{ $IdApplication->job_business }}</p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Birthday:
                                                                            {{ $IdApplication->birthday }}</p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Signature:
                                                                            <img src="{{ asset('storage/' . $IdApplication->electronic_signature) }}"
                                                                                class="img-thumbnail"
                                                                                style="border-radius: 5%"
                                                                                alt="user1">
                                                                        </p>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <p class="text-sm text-bold mb-0">Picture:
                                                                            <img src="{{ asset('storage/' . $IdApplication->picture) }}"
                                                                                class="img-thumbnail"
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

                                                <!-- Delete Button-->
                                                <td class="align-middle text-center">
                                                    <div class="row">
                                                        <div class="card-body p-3">
                                                            <div class="row">
                                                                <div class="numbers">
                                                                    <button class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteIdApplicationModal{{ $IdApplication->id }}">
                                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                                            style="font-size:13px; width:50px;">
                                                                            Delete
                                                                        </p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>

                                                <!-- Modal For Deleting ID Application-->
                                                <div class="modal fade"
                                                    id="deleteIdApplicationModal{{ $IdApplication->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="modalForDeletingApplicationModal"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="center-align">
                                                                    <h5 class="modal-title"
                                                                        id="modalForDeletingApplicationModal">
                                                                        Delete ID
                                                                        Application</h5>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure you want to delete this pending ID
                                                                    Application?</h5>

                                                                <form method="post"
                                                                    action="{{ route('delete.IdApplication', $IdApplication->id) }}"
                                                                    id="editForm">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Yes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-sm mb-2 fst-italic" style="text-align: center;">No ID
                                            Application
                                            Request
                                            Found</p>
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





<!-- Courses Available-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="card-header pb-0">
                            <h6>Courses Available</h6>
                        </div>
                        <div>
                            <a class="btn btn-info mt-4" style="margin-right: 5.94109; margin-right: 20px;"
                                type="button" data-bs-toggle="modal" data-bs-target="#createCourseModal">+&nbsp; Add
                                Course</a>
                        </div>
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
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pending</th>
                                        <th></th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($courses))
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                            class="avatar avatar-circle me-3"
                                                            style="border-radius: 50%" alt="user1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $course->course }}
                                                            </h6>

                                                        </div>
                                                    </div>
                                                </td>



                                                <!-- View Course Description Button-->
                                                <td class="align-middle text-center">
                                                    <div class="row">
                                                        <div class="card-body p-3">
                                                            <div class="row">
                                                                <div class="numbers">
                                                                    <button class="btn btn-success"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewCourseDescription{{ $course->id }}">
                                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                                            style="font-size:13px; width:65px; margin: auto">
                                                                            Description</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>

                                                <!-- Modal For Viewing Course Description-->
                                                <div class="modal fade"
                                                    id="viewCourseDescription{{ $course->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modalForViewing"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="center-align">
                                                                    <h5 class="modal-title" id="modalForViewing">
                                                                        Course Description
                                                                    </h5>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p class="text-sm text-bold mb-0">
                                                                            Description: {!! nl2br($course->course_description) !!}

                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pt-2 pb-0 mb-0">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Button-->
                                                <td class="align-middle text-center">
                                                    <div class="row">
                                                        <div class="card-body p-3">
                                                            <div class="row">
                                                                <div class="numbers">
                                                                    <button class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteCourse{{ $course->id }}">
                                                                        <p class="font-weight-bolder mb-0 text-capitalize"
                                                                            style="font-size:13px; width:50px;">
                                                                            Delete
                                                                        </p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>

                                                <!-- Modal For Deleting Course-->
                                                <div class="modal fade" id="deleteCourse{{ $course->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="modalForDeletingCourse" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="center-align">
                                                                    <h5 class="modal-title"
                                                                        id="modalForDeletingCourse">
                                                                        Delete Course
                                                                        {{ $course->id }}</h5>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure you want to delete this Course?
                                                                </h5>

                                                                <form method="post"
                                                                    action="{{ route('delete.course', $course->id) }}"
                                                                    id="editForm">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Yes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-sm mb-2 fst-italic" style="text-align: center;">No Course
                                            Available</p>
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


<!-- Create Course Modal -->
<div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="modalForCourse" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div style="center-align">
                    <h5 class="modal-title" id="modalForCourse">Add Course</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.course') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="title">Course Title</label>
                            <input type="text" id="course" class="form-control" name="course"
                                placeholder="Enter Course Title" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="body">Course Description</label>
                            <textarea id="body" class="form-control" name="course_description" placeholder="Enter Post Body" rows="" required></textarea>
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
</div>

@endsection
