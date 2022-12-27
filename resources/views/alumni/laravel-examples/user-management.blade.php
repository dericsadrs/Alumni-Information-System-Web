@extends('alumni.layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">


                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Alumni</h5>
                            </div>
                            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('alumni/search-alumni') }}">
                                <input class="form-control" name="query" id="query" type="search"
                                    placeholder="Search alumni here...">
                            </form>

                        </div>

                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">

                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Job/Business
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Contact Number
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tr>
                                    @foreach ($alumnis as $alumni)
                                        <td class="ps-4">

                                        </td>
                                        <td>
                                            <div>
                                                <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                    class="avatar avatar-circle me-3" style="border-radius: 50%"
                                                    alt="user1">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $alumni->full_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $alumni->job_business }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $alumni->address }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold"> (+63)
                                                {{ $alumni->contact_number }}</span>
                                        </td>
                                        <td class="text-center">
                                            <button class="form-control btn pt-2 mt-2" data-bs-toggle="modal"
                                                data-bs-target="#postModal{{ $alumni->id }}">View</button>
                                        </td>
                                </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- View User -->
    @if (count($alumnis))
        @foreach ($alumnis as $alumni)
        @if($alumni->privateInfo == 0)
            <div class="modal fade" id="postModal{{ $alumni->id }}" tabindex="-1" aria-labelledby="modalForPost"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col ">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 text-center bg-light"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="{{ asset('storage/' . $alumni->image_path) }}" alt="Avatar"
                                        class="img-thumbnail mt-5 mb-2" style="width: 200px;" />
                                        <h5>{{ $alumni->title }} {{ $alumni->full_name }} </h5>
                                        <h6>"{{ $alumni->nickname }}"</h6>
                                        <h6 class="lead">{{ $alumni->job_business }}</h6>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Personal Information:</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="col-6 mb-3">
                                                <h6>College Batch:</h6>
                                                <p class="strong"> {{ $alumni->college_batch }} </p>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Email:</h6>
                                                    <p class="strong"> {{ $alumni->email_address }} </p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Phone Number:</h6>
                                                    <p class="strong"> (+63) {{ $alumni->contact_number }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h6>Home Address:</h6>
                                                    <p class="strong">{{ $alumni->address }}</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6>Birthday:</h6>
                                                        <p class="strong"> {{ $alumni->birthday }} </p>
                                                    </div>
                                                    <div class="col">
                                                        <h6>Gender:</h6>
                                                        <p class="strong">{{ $alumni->gender }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <h6>Civil Status:</h6>
                                                        <p class="strong"> {{ $alumni->civil_status }}</p>
                                                    </div>
                                                </div>
                                               
                                                @foreach($courses as $course)
                                                @if($alumni->courses_id == $course->id)
                                                <div class="col">
                                                    <h6>Course:</h6>
                                                    <p class="strong"> {{ $course->course }} </p>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>

                                            <h6>School Background Information</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row">
                                                <div class="col">
                                                    <h6>High School Attended:</h6>
                                                    <p class="strong"> {{ $alumni->high_school }} </p>
                                                </div>
                                                <div class="col">
                                                    <h6>Year Graduated:</h6>
                                                    <p class="strong">{{ $alumni->high_school_yg }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6>Senior High School Attended:</h6>
                                                    <p class="strong"> {{ $alumni->senior_highschool }} </p>
                                                </div>
                                                <div class="col">
                                                    <h6>Year Graduated:</h6>
                                                    <p class="strong"> {{ $alumni->senior_highschool_yg }} </p>
                                                </div>
                                            </div>
  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @else 
            <div class="modal fade" id="postModal{{ $alumni->id }}" tabindex="-1" aria-labelledby="modalForPost"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col ">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 text-center bg-light"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="{{ asset('storage/' . $alumni->image_path) }}" alt="Avatar"
                                        class="img-thumbnail mt-5 mb-2" style="width: 200px;" />
                                        <h5>{{ $alumni->title }} {{ $alumni->full_name }} </h5>
                                        <h6>"{{ $alumni->nickname }}"</h6>
                                        <h6 class="lead">{{ $alumni->job_business }}</h6>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Personal Information:</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="col-6 mb-3">
                                                <h6>College Batch:</h6>
                                                <p class="strong"> {{ $alumni->college_batch }} </p>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Email:</h6>
                                                    <p class="strong"> {{ $alumni->email_address }} </p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Phone Number:</h6>
                                                    <p class="strong"> (+63) {{ $alumni->contact_number }}</p>
                                                </div>                                        
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6>Gender:</h6>
                                                    <p class="strong">{{ $alumni->gender }}</p>
                                                </div>
                                                <div class="col">
                                                    <h6>Civil Status:</h6>
                                                    <p class="strong"> {{ $alumni->civil_status }}</p>
                                                </div>
                                            </div>
                                            @foreach($courses as $course)
                                            @if($alumni->courses_id == $course->id)
                                                <div class="col">
                                                    <h6>Course:</h6>
                                                    <p class="strong"> {{ $course->course }} </p>
                                                </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    @else
        <h2 class="text-center text-secondary p-4">No Alumni/User Found In The Database!</h2>
    @endif


    </main>
@endsection
