@extends('alumni.layouts.user_type.auth')

@section('content')
    @include('flash-message')

    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header pt-4 pb-0">
                    <h5 class="mb-1">Upload Image:</h5>
                </div>
                <div class="card-body p-4 pt-2 pb-0">
                    <form action="{{ url('alumni/gallery') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-2">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="control-group col-12 mt-2">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" placeholder="Enter Description" rows="" required></textarea>
                            </div>

                        </div>
                        <div class="my-2">
                            <input type="submit" value="+&nbsp;Add Image" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @if (session('message'))
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4 mt-1">
        @forelse($photo as $key => $row)
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/' . $row->image) }}" class="card-img img-fluid">
                </div>

                <!-- Delete Button -->
                @if (Auth::id() == $row->user_id)
                <div class="col-lg-12 col-5 my-auto text-end">
                    <div class="float-lg-end pe-4 pt-2">
                        <a class="cursor-pointer" id="dropdownTable" style="text-align: right;" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true">
                            </i>
                        </a>

                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                            <li>
                                <a href="#destroy{{ $row->id }}" data-bs-toggle="modal"
                                    class="dropdown-item border-radius-md">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                
                <div class="modal fade" id="destroy{{ $row->id }}" tabindex="-1" aria-labelledby="modalForDestroy"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div style="center-align">
                                    <h5 class="modal-title" id="modalForDestroy">Delete Post</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('alumni.gallery.destroy', $row->id) }}" id="editForm"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <h4 class="text-center">Are you sure you want to this post?</h4>
                                </div>
                                <div class="modal-footer">
                                    <a href="#"><button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button></a>
                                    <button type="submit" class="btn btn-danger" title="Delete Post"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i> Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-center pt-2">
                <p class="text-xs text-secondary mb-3 ">Posted
                    {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</p>
            </div>
            <p class="text-xs text-secondary mb-2 ">Posted by: {{$row->user->name}}</p>
            <p class="text-xs text-secondary mb-0 ">Description: {{$row->description}} </p>
            
    </div>
@empty
    <h2 class="text-center text-secondary p-4">No Image found in the database!</h2>
    @endforelse
    <div class="d-flex justify-content-center">
        {{ $photo->onEachSide(1)->links() }}
    </div>
    </div>




    </main>
@endsection
