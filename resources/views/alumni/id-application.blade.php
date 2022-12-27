@extends('alumni.layouts.user_type.auth')

@section('content')
    @include('flash-message')


    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <h3>ID Application Form</h3>

                    <form method="POST" action="/alumni/id-application" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-7">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="ex. Jose Rizal" name="full_name"
                                    id="full_name" value="{{ old('full_name') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" required>
                            </div>
                            <div class="col-md-2">
                                <label>Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">----</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="N/A">N/A</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Civil Status</label>
                                <select class="form-control" id="civil_status" name="civil_status" required>
                                    <option value="">----</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="N/A">N/A</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Job/Business</label>
                            <input type="text" class="form-control" placeholder="Home Address" name="job_business"
                                id="job_business" value="{{ old('job_business') }}" required>
                        </div>
                        <div class="col-md-6">
                          <label>Address</label>
                          <input type="text" class="form-control" placeholder="Home Address" name="address"
                              id="address" value="{{ old('address') }}" required>
                      </div>
                        <br>

                        <div class="row">
                            <h6>Contact Information</h6>
                            <div class="col-md-4">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" placeholder="Contact Number"
                                    name="contact_number" id="contact_number" value="{{ old('contact_number') }}" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <h6>Educational Background</h6>
                            <div class="col-md-4">
                                <label>Course Completed</label>
                                <input type="text" class="form-control" placeholder="Course completed"
                                    name="educational_bg" id="educational_bg" value="{{ old('educational_bg') }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <h6>Upload 2x2 picture</h6>
                                    <div class="form-group">
                                        <input type="file" name="picture" id="picture" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h6>Upload E-Signature</h6>
                                    <div class="form-group">
                                        <input type="file" name="electronic_signature" id="electronic_signature" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary">
                            </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
@endsection
