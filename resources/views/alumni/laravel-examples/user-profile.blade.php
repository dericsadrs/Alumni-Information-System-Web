@extends('alumni.layouts.user_type.auth')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/curved-images/bg.jpg'); background-position-y: 50%;">
                <span class=""></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('storage/' . $currentUser->image_path) }}" alt="..."
                                class="w-100 border-radius-lg shadow-sm">
                            <a href="#edit{{ $currentUser->id }}" data-bs-toggle="modal"
                                class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                <i class="fa fa-pen top-0" title="Edit Image"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }} @foreach ($courses as $currentUserCourse)
                                @if ($currentUser->courses_id == $currentUserCourse->id) <p class="mb-0 font-weight-bold text-sm"> ({{ $currentUserCourse->course }}) </p>
                                @endif
                                @endforeach
                            </h5>

                            <p class="mb-0 font-weight-bold text-sm">
                                {{ auth()->user()->email }} 
                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Profile Information') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    <form action="user-profile" method="POST" role="form text-left">
                        @csrf
                        @if ($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $errors->first() }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success"
                                role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('Title') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <select id="title" class="form-control" name="title">
                                            <option value="{{ $currentUser->title }}">{{ $currentUser->title }}</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->name }}" type="text"
                                            placeholder="Name" id="user-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Nickname') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->nickname }}" type="text"
                                            placeholder="Nickname" id="nickname" name="nickname">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->email }}" type="email"
                                            placeholder="@example.com" id="user-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                         

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">{{ __('Phone Number') }}</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="Phone Number"
                                            id="contact_number" name="contact_number"
                                            value="{{ $currentUser->contact_number }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user.courses_id" class="form-control-label">{{ __('Course') }}</label>
                                    <div class="@error('user.courses_id')border border-danger rounded-3 @enderror">
                                        <select id="courses_id" class="form-control" name="courses_id">
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->course }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Birthday') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->birthday }}" type="date"
                                            id="birthday" name="birthday">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Gender') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <select id="gender" class="form-control" name="gender">
                                            <option value="{{ $currentUser->gender }}">{{ $currentUser->gender }}
                                            </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Civil Status') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <select id="civil_status" class="form-control" name="civil_status">
                                            <option value="{{ $currentUser->civil_status }}">
                                                {{ $currentUser->civil_status }}</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="college_batch"
                                        class="form-control-label">{{ __('College Batch') }}</label>
                                    <div class="@error('college_batch')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="College Batch"
                                            id="college_batch" name="college_batch"
                                            value="{{ $currentUser->college_batch }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">{{ __('Home Address') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $currentUser->address }}" type="text"
                                        placeholder="Home Address" id="address" name="address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Job Role/Business Name') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->job_business }}"
                                            type="text" placeholder="Job or Business" id="job_business"
                                            name="job_business">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Company/Business Address') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->business_address }}"
                                            type="text" placeholder="Business Address" id="business_address"
                                            name="business_address">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Company/Business Contact#') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->company_contact }}"
                                            type="tel" placeholder="Company Contact#" id="company_contact"
                                            name="company_contact">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Company Name') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->company_name }}"
                                            type="text" placeholder="Company Name" id="company_name"
                                            name="company_name">
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                        <div class="row">
                            <h6>School Backgrouind Informatiom</h6>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""
                                        class="form-control-label">{{ __('High School Graduated') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->high_school }}"
                                            type="text" placeholder="High School Graduated" id="high_school"
                                            name="high_school">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Year Graduated') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->high_school_yg }}"
                                            type="text" placeholder="Year Graduated" id="high_school_yg"
                                            name="high_school_yg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""
                                        class="form-control-label">{{ __('Senior High School Graduated') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->senior_highschool }}"
                                            type="text" placeholder="Senior High School Gr"aduated
                                            id="senior_highschool" name="senior_highschool">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">{{ __('Year Graduated') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $currentUser->senior_highschool_yg }}"
                                            type="text" placeholder="Year Graduated" id="senior_highschool_yg"
                                            name="senior_highschool_yg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-check form-switch" >
                            <input type="hidden" value="0" name="privateInfo">
                            <input class="form-check-input" type="checkbox" id="privateInfo" name="privateInfo" value="1" @if($currentUser->privateInfo == 1) checked=""@endif><label>Switch On To Make Information Private</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <!-- Edit Profile Modal -->
    <div class="modal fade" id="edit{{ $currentUser->id }}" tabindex="-1" aria-labelledby="modalForEdit"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div style="center-align">
                        <h5 class="modal-title" id="modalForEdit">Upload New Profile</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('alumni.profile.update', $currentUser->id) }}"
                        enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @method('PATCH')
                        <div class="row">
                            <div class="my-2">
                                <input type="file" name="image_path" class="form-control" accept="image_path/*">
                                @error('image_path')
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


    </main>
@endsection
