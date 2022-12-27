@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">


                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Users</h5>
                            </div>

                            <!-- First Dropdown button -->
                            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                                <div class="dropdown">
                                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort By
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>


                            <!-- Second Dropdown button -->
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort By
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>

                            <div>
                                <a class="btn btn-primary" href="{{ url('/alumni/pdf') }}">Export to PDF</a>
                            </div>

                            <div class="align-items-end mt-0">
                                <form type="get" action="{{ url('/search-alumni') }}">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                        <input name="query" type="search" class="form-control"
                                            placeholder="Type here...">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">

                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gender
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creation Date
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
                                            Civil Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Birthday
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Job/Business
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Job/Business Address
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            High School
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            High School Year Graduated
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Senior High School
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Senior High School Year Graduated
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            College Batch
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NickName
                                        </th>
                                         <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Company Name
                                        </th>
                                       <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Company Contact
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Course
                                        </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if(count($alumnis))
                                        @foreach ($alumnis as $alumniInfo)
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $alumniInfo->id }}</p>
                                            </td>
                                            <td>

                                                @foreach ($users as $user)
                                                    @if ($alumniInfo->user->id == 1)
                                                        <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                            class="avatar avatar-circle me-3" style="border-radius: 50%"
                                                            alt="user1">
                                                    @break

                                                @else
                                                    @foreach ($user->alumnis as $alumni)
                                                        @if ($alumniInfo->user->id == $alumni->id && $alumniInfo->user->id != 1)
                                                            <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                                class="avatar avatar-circle me-3"
                                                                style="border-radius: 50%" alt="user1">
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->title }}</span>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $alumniInfo->full_name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $alumniInfo->email_address }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $alumniInfo->gender }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->created_at->format('m/d/Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->address }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">(+63)
                                            {{ $alumniInfo->contact_number }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->civil_status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->birthday }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->job_business }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->business_address }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->high_school }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->high_school_yg }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->senior_highschool }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->senior_highschool_yg }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->college_batch }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->nickname }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $alumniInfo->company_name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">(+63) {{ $alumniInfo->company_contact }}</span>
                                    </td>
                                    
                                    @foreach($courses as $course)
                                    @if($alumniInfo->courses_id == $course->id)
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $course->course }}</span>
                                    </td>
                                    @endif
                                    @endforeach


                            </tr>
                            @endforeach
                            @else 
                            <p class="text-sm mb-2 fst-italic" style="text-align: center;">No Results Found</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
