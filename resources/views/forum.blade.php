@extends('layouts.user_type.auth')

@section('content')
    @include('flash-message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="card-body px-0 pt-0 pb-2">
                    <div style="text-align: right; ">
                        <a href="{{ url('/forum') }}" class="btn btn-info" type="button" data-bs-toggle="modal"
                            data-bs-target="#questionModal">+&nbsp; Ask Question</a>
                    </div>
                    <div class="card-body">
                        <div style="text-align: center; ">
                        </div>
                        <div class="table-responsive">
                            <tbody>
                                <!-- Loop for Post-->
                                @foreach ($forums as $forum)
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-3">
                                                    <div class="card-body px-0 pb-3 pt-2">
                                                        <div class="d-flex px-2 py-1">

                                                            @foreach ($users as $user)
                                                                @if ($forum->user->id == 1)
                                                                    <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                                        class="avatar avatar-circle me-3"
                                                                        style="border-radius: 50%" alt="user1">
                                                                @break

                                                            @else
                                                                @foreach ($user->alumnis as $alumni)
                                                                    @if ($forum->user->id == $alumni->id && $forum->user->id != 1)
                                                                        <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                                            class="avatar avatar-circle me-3"
                                                                            style="border-radius: 50%" alt="user1">
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $forum->user->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $forum->user->email }}</p>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ \Carbon\Carbon::parse($forum->updated_at)->diffForHumans() }}</p>
                                                    </div>

                                                    <!-- Edit and Delete Button -->
                                                    <div class="position-absolute top-3 end-1">
                                                        <div class="col-lg-8 col-5 my-auto text-end">
                                                            <div class="primary float-lg-end pe-2">
                                                                <a class="cursor-pointer" id="dropdownTable"
                                                                    style="text-align: right;"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v text-secondary"
                                                                        aria-hidden="true">
                                                                    </i>
                                                                </a>
                                                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                                    aria-labelledby="dropdownTable">
                                                                    @if (Auth::id() == $forum->user_id)
                                                                    <li>
                                                                        <a href="#edit{{ $forum->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="dropdown-item border-radius-md">
                                                                            Edit
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                    <li>
                                                                        <a href="#destroy{{ $forum->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="dropdown-item border-radius-md">
                                                                            Delete </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Edit Forum Modal -->
                                                <div class="modal fade" id="edit{{ $forum->id }}" tabindex="-1"
                                                    aria-labelledby="modalForForumEdit" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="center-align">
                                                                    <h5 class="modal-title" id="modalForForumEdit">
                                                                        Edit Forum Post</h5>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('forum.update', $forum->id) }}"
                                                                    id="editForm">
                                                                    {!! csrf_field() !!}
                                                                    @method('PATCH')
                                                                    <div class="row">
                                                                        <div class="control-group col-12 mt-2">
                                                                            <label for="content">Content</label>
                                                                            <textarea class="form-control" name="content" id="content" placeholder="Enter Post Body" rows="" required>{{ old('content', $forum->content) }}</textarea>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#"><button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button></a>
                                                                <a href="#"><button type="submit"
                                                                        value="POST"
                                                                        class="btn btn-success">Update and save
                                                                        changes</button></a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Forum Modal -->
                                                <div class="modal fade" id="destroy{{ $forum->id }}"
                                                    tabindex="-1" aria-labelledby="modalForDestroy"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="center-align">
                                                                    <h5 class="modal-title" id="modalForDestroy">
                                                                        Delete Post</h5>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('forum.destroy', $forum->id) }}"
                                                                id="editForm" accept-charset="UTF-8"
                                                                style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                    <h4 class="text-center">Are you sure you want
                                                                        to this post?</h4>
                                                                    <h5 class="text-center pr- text-sm">Content:
                                                                        {{ $forum->content }}</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#"><button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal"><i
                                                                                class="fa fa-times"></i>
                                                                            Close</button></a>
                                                                    <button type="submit" class="btn btn-danger"
                                                                        title="Delete Post"><i
                                                                            class="fa fa-trash-o"
                                                                            aria-hidden="true"></i> Yes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-header pb-0 pt-3" style="text-align: center; ">
                                                <div class="card-body pb-1 pt-0">
                                                    <div>
                                                        <p class="mb-0 mt-text-sm">{!! nl2br($forum->content) !!}</p>
                                                    </div>
                                                </div>
                                                <hr class="mb-4">

                                                @if (count($forum->replies))
                                                    @foreach ($forum->replies as $reply)
                                                        <div class="card mb-1 pt-1">
                                                            <div class="d-flex px-2 py-1 mb-2">

                                                                @foreach ($users as $user)
                                                                    @if ($reply->user->id == 1)
                                                                        <img src="{{ asset('storage/' . $univInfo->logo) }}"
                                                                            class="avatar avatar-circle me-3"
                                                                            style="border-radius: 50%"
                                                                            alt="user1">
                                                                    @break

                                                                @else
                                                                    @foreach ($user->alumnis as $alumni)
                                                                        @if ($reply->user->id == $alumni->id && $reply->user->id != 1)
                                                                            <img src="{{ asset('storage/' . $alumni->image_path) }}"
                                                                                class="avatar avatar-circle me-3"
                                                                                style="border-radius: 50%"
                                                                                alt="user1">
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach

                                                        <div class="d-flex flex-column">

                                                            <div class="font-weight-bold mb-0 text-xs" align="left">
                                                                {{ $reply->user->name }}</div>
                                                            <div class="text-xs text-secondary mb-0" align="left">
                                                                {{ $reply->user->email }}</div>
                                                            <div class="text-xs text-secondary mb-0" align="left">
                                                            {{ \Carbon\Carbon::parse($reply->updated_at)->diffForHumans() }}</div>
                                                        </div>

                                                        <!-- Edit and Delete Button For Reply-->
                                                        <div class="position-absolute top-1 end-2">
                                                            <div class="col-lg-8 col-5 text-end">
                                                                <div
                                                                    class="primary float-lg-end pe-0 pt-2">
                                                                    <a class="cursor-pointer"
                                                                        id="dropdownTable"
                                                                        style="text-align: right;"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fa fa-ellipsis-v text-secondary"
                                                                            aria-hidden="true">
                                                                        </i>
                                                                    </a>
                                                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                                        aria-labelledby="dropdownTable">
                                                                        @if (Auth::id() == $reply->user_id)
                                                                        <li>
                                                                            <a href="#editReply{{ $reply->id }}"
                                                                                data-bs-toggle="modal"
                                                                                class="dropdown-item border-radius-md">
                                                                                Edit
                                                                            </a>
                                                                        </li>
                                                                        @endif
                                                                        <li>
                                                                            <a href="#destroyReply{{ $reply->id }}"
                                                                                data-bs-toggle="modal"
                                                                                class="dropdown-item border-radius-md">
                                                                                Delete
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Edit Reply Modal -->
                                                    <div class="modal fade"
                                                        id="editReply{{ $reply->id }}" tabindex="-1"
                                                        aria-labelledby="modalForReplyEdit"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div style="center-align">
                                                                        <h5 class="modal-title"
                                                                            id="modalForReplyEdit">Edit
                                                                            Reply Post</h5>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('reply.update', $reply->id) }}"
                                                                        id="editForm">
                                                                        {!! csrf_field() !!}
                                                                        @method('PATCH')
                                                                        <div class="row">
                                                                            <div
                                                                                class="control-group col-12 mt-2">
                                                                                <label
                                                                                    for="content">Content</label>
                                                                                <textarea class="form-control" name="content" id="content" placeholder="Enter Post Body" rows="" required>{{ old('content', $reply->content) }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#"><button
                                                                            type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button></a>
                                                                    <a href="#"><button
                                                                            type="submit" value="POST"
                                                                            class="btn btn-success">Update
                                                                            and save
                                                                            changes</button></a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Reply Modal -->
                                                    <div class="modal fade"
                                                        id="destroyReply{{ $reply->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="modalForReplyDestroy"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div style="center-align">
                                                                        <h5 class="modal-title"
                                                                            id="modalForReplyDestroy">
                                                                            Delete Reply</h5>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('reply.destroy', $reply->id) }}"
                                                                    id="editForm" accept-charset="UTF-8"
                                                                    style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <h4 class="text-center">Are you
                                                                            sure you want to this reply?
                                                                        </h4>
                                                                        <h5
                                                                            class="text-center pr- text-sm">
                                                                            Content: {{ $reply->content }}
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="#"><button
                                                                                type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal"><i
                                                                                    class="fa fa-times"></i>
                                                                                Close</button></a>
                                                                        <button type="submit"
                                                                            class="btn btn-danger"
                                                                            title="Delete Post"><i
                                                                                class="fa fa-trash-o"
                                                                                aria-hidden="true"></i>
                                                                            Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-0">
                                                    <p class="text-sm mb-2">{!! nl2br($reply->content) !!}
                                                    </p>
                                                </div>
                                    </div>
                                    <div class="mb-3">
                                    </div>
                @endforeach
            @else
                <p class="text-sm mb-2 fst-italic">No comments Found</p>
                @endif


                <!-- Forum reply-->
                <form action="{{ url('reply', $forum->id) }}" method="post">
                    {!! csrf_field() !!}
                    <textarea id="content" class="form-control" name="content"
                        placeholder="Write anything that is related to the question" rows="" required></textarea>
                    <br>
                    <div style="text-align: left; font-size: 20px;">
                        <button type="submit" value="Post" class="btn btn-info"
                            style="font-size: 12px; border-radius: 2px; text-transform: initial;">
                            Post your answer </button>
                </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endforeach

</tbody>
</div>
</div>
</div>
</div>

<div class="col-5">
<div class="card mb-4">
<div class="card-body px-0 pt-0 pb-2">
<div style="text-align: center; " class="card-header pb-0">
    <h6>Available Jobs</h6>
</div>
<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>

            </thead>
            @if (count($jobs))
            @foreach ($jobs as $job)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $job->title }}</h6>

                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $job->address }}</p>
                        <p class="text-xs text-secondary mb-0"> Posted: {{ \Carbon\Carbon::parse($job->updated_at)->diffForHumans() }}</p>
                    </td>

                    <td class="pb-6">
                        <p></p>
                    </td>
                </tr>
            @endforeach
            @else
            <p class="text-center text-secondary p-4">No Job found in the database!</p>
            @endif
            <div class="table-responsive">
                <table class="table">

                </table>
            </div>

    </div>
</div>
</div>
</div>
</div>


<!-- Modal For Question -->
<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="modalForQuestion" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <div style="center-align">
        <h5 class="modal-title" id="modalForQuestion">Create Question</h5>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ url('forum') }}" method="post">
        {!! csrf_field() !!}
        <div class="row">
            <div class="control-group col-12 mt-2">
                <label for="body">Write your question</label>
                <textarea id="content" class="form-control" name="content"
                    placeholder="Start your question with &quot;What&quot;, &quot;How&quot;, &quot;Why&quot;, etc." rows=""
                    required></textarea>
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

<!-- Modal For Reply -->
@if(count($forums))
<div class="modal fade" id="replyModal{{ $forum->id }}" tabindex="-1" aria-labelledby="modalForReply"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <div style="center-align">
        <h5 class="modal-title" id="modalForReply">Create Reply</h5>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ url('reply.store', $forum->id) }}" method="post">
        {!! csrf_field() !!}
        <div class="row">
            <div class="control-group col-12 mt-2">
                <label for="body">Write your reply</label>
                <textarea id="content" class="form-control" name="content"
                    placeholder="Write anything that is related to the question" rows="" required></textarea>
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
@else 
<p class="text-center text-secondary p-4">No Forum found in the database!</p>
@endif





</main>
@endsection
