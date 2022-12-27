@extends('layouts.user_type.auth')

@section('content')
    @include('flash-message')



    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header pt-4 pb-0" style="text-align: center">
                    <h5 class="mb-1">Available Jobs</h5>
                </div>
                <div class="card-body p-4 pt-2 pb-0">
                    <form type="get" action="{{ url('/search-job') }}">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input name="query" type="search" class="form-control" placeholder="Type here...">
                        </div>
                    </form>
                    <div style="text-align: right;" class="pt-3">
                        <a href="{{ url('/job') }}" class="btn btn-info" type="button" data-bs-toggle="modal"
                            data-bs-target="#jobModal">+&nbsp; Add Job</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid pt-2">
        <div class="row">
            @if (count($jobs))
            @foreach ($jobs as $job)
                <div class="col-lg-6 col-7">
                    <div class="card mb-3">
                        <div class="card-body px-0 pb-3 pt-0">
                            <div class="card-header pb-0" style="text-align: left; ">

                                <!-- Edit and Delete Button -->
                                <div class="col-lg-12 col-5 my-auto text-end">
                                    <div class="float-lg-end pe-2">
                                        <a class="cursor-pointer" id="dropdownTable" style="text-align: right;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true">
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                            @if (Auth::id() == $job->user_id)
                                            <li>
                                                <a href="#edit{{ $job->id }}" data-bs-toggle="modal"
                                                    class="dropdown-item border-radius-md">Edit</a>
                                            </li>
                                            @endif
                                            <li>
                                                <a href="#destroy{{ $job->id }}" data-bs-toggle="modal"
                                                    class="dropdown-item border-radius-md">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit{{ $job->id }}" tabindex="-1"
                                    aria-labelledby="modalForEdit" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div style="center-align">
                                                    <h5 class="modal-title" id="modalForEdit">Edit Post</h5>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('job.update', $job->id) }}"
                                                    id="editForm">
                                                    {!! csrf_field() !!}
                                                    @method('PATCH')
                                                    <div class="row">
                                                        <div class="control-group col-12">
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $job->title }}" id="title"
                                                                placeholder="Enter Job Title" required>
                                                        </div>

                                                        <div class="control-group col-12 mt-2">
                                                            <label for="body">Address</label>
                                                            <textarea id="address" class="form-control" name="address" rows="" required>{{ old('content', $job->address) }}</textarea>
                                                        </div>

                                                        <div class="control-group col-12 mt-2">
                                                            <label for="content">Content</label>
                                                            <textarea class="form-control" name="content" id="content" placeholder="Enter Post Body" rows="" required>{{ old('content', $job->content) }}</textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#"><button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button></a>
                                                <a href="#"><button type="submit" value="POST"
                                                        class="btn btn-success">Update and
                                                        save changes</button></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Delete Modal -->
                                <div class="modal fade" id="destroy{{ $job->id }}" tabindex="-1"
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
                                            <form method="POST" action="{{ route('job.destroy', $job->id) }}"
                                                id="editForm" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <h4 class="text-center">Are you sure you want to this post?</h4>
                                                    <h5 class="text-center pr- text-sm">Title: {{ $job->title }}</h5>
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


                            <h5 class="text-center">{{ $job->title }}</h5>
                            <div>
                                <p class="mb-1 text-center">{{ $job->address }}</p>
                            </div>
                            <div class="card-body text-center pt-2 pb-0">
                                <p class="mb-2" style="font-size: 12px;">Posted
                                    {{ \Carbon\Carbon::parse($job->updated_at)->diffForHumans() }}</p>
                            </div>
                            <div style="text-align: center;">
                                <a href="{{ url('/tables') }}" class="btn btn-info" type="button"
                                    data-bs-toggle="modal" data-bs-target="#emailModal"
                                    style="font-size: 10px; border-radius: 2px; text-transform: initial;"
                                    data-bs-toggle="modal" data-bs-target="#replyModal"> Apply Now</a>
                            </div>
                            <hr>
                            <h7>Job Description: </h7>
                            <div class="card-body">
                                <p class="text-sm mb-0">{!! nl2br($job->content) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        @else
        <h2 class="text-center text-secondary p-4">No Job found in the database!</h2>
        @endif
        <div class="d-flex justify-content-center">
            {!! $jobs->appends(Request::except('page'))->render() !!}
        </div>







        <!-- Modal For Job Application-->
        <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="modalForEmail" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="center-align">
                            <h5 class="modal-title" id="modalForPost">Attached Resume Here!</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="control-group col-12 mt-2">
                                    <input type="file" name="attachment" class="form-control">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Apply Now!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal For Add Job Opportunity -->
    <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="modalForJob" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div style="center-align">
                        <h5 class="modal-title" id="modalForJob">Create Job Opportunity</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('job') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Job Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                    placeholder="Enter Job Title" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Address</label>
                                <textarea id="body" class="form-control" name="address" placeholder="Business Address eg. Naga City"
                                    rows="" required></textarea>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Job Description</label>
                                <textarea id="body" class="form-control" name="content"
                                    placeholder="Describe general tasks, or other related duties, and responsibilities of the position" rows=""
                                    required></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="post" class="btn btn-success">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>




    </main>
@endsection
