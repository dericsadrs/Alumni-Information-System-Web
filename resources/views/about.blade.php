@extends('layouts.user_type.auth')

@section('content')
    @include('flash-message')

    <div class="row">

        <div class="col-6">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">

                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Perks Posting</h5>
                        </div>

                        <a href="{{ url('/perk') }}" class="btn btn-info" type="button" data-bs-toggle="modal"
                            data-bs-target="#perkModal">+&nbsp; Add Perk</a>
                    </div>

                </div>
                <div class="card-body px-0 pt-0">
                    <hr>
                    <table class="table align-items-center mb-0">
                        @if (count($perks))
                            @foreach ($perks as $count => $perk)
                                <tbody>
                                    <tr class="d-inline-block">
                                        <td class="ps-4" @if ($count === 0) class="active" @endif>
                                            <p class="text-sm font-weight-bold mb-0">{{ $count + 1 }}</p>
                                        </td>
                                        <td class="text-left text-wrap">
                                            <p class="text-sm mb-0">{!! nl2br($perk->content) !!}</p>
                                        </td>

                                        <td>
                                            <div style="position: absolute; right: 10px;">
                                                <a href="#" title="Delete" data-bs-toggle="modal"
                                                     data-bs-target="#destroyPerk{{ $perk->id }}">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                            </div>

                                            <!-- Delete Perk Modal -->
                                            <div class="modal fade" id="destroyPerk{{ $perk->id }}" tabindex="-1"
                                                aria-labelledby="modalForDestroy" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div style="center-align">
                                                                <h5 class="modal-title" id="modalForDestroy">Delete Post
                                                                </h5>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="{{ route('perk.destroy', $perk->id) }}"
                                                            id="deleteForm" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <h4 class="text-center">Are you sure you want to this post?
                                                                </h4>
                                                                <h5 class="text-center">Content: {{ $perk->content }}
                                                                </h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#"><button type="button"
                                                                        class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                                            class="fa fa-times"></i>
                                                                        Close</button></a>
                                                                <button type="submit" class="btn btn-danger"
                                                                    title="Delete Post"><i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <p class="text-sm-center mb-2 fst-italic">No Perks Posted</p>
                        @endif


                    </table>
                    <hr class="pt-0 mt-2 pb-0 mb-0">
                </div>
                <div class="pb-2">
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">About The System</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <p class="text-sm">
                        Alumni Information System is an interactive generic web application and a mobile application
                        designed for the faculty and alumni of any kind of university. This project stores an alumni database
                        to keep track and maintain the school’s record of alumni information and create opportunities for
                        alumni and their institution to stay connected and engage with their college mates and friends.
                        <br><br>
                        The system will aid all the colleges and departments in a university to find people for the right event, communicate,
                        share experiences, post announcements, look for recommendations, and seek opportunities. The
                        system will provide a platform to share information, provide help, and create opportunities while
                        maintaining connections with fellow alumni and their institutions. The system will help the alumni
                        and the university maintain connectivity and keep track and enhance their database system that
                        holds all the information of their alumni.
                        <br><br>
                        By providing a system that enables the university to track, and establish a connection with
                        its alumni. The university will have more access when it comes to opportunities, employment,
                        information, and charity. The same thing goes for the alumni; it will allow them to be updated
                        when it comes to job opportunities, events, and reunions.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal For Adding Perks -->
    <div class="modal fade" id="perkModal" tabindex="-1" aria-labelledby="modalForPerk" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div style="center-align">
                        <h5 class="modal-title" id="modalForPerk">Create Perk</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('perk') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="control-group col-12 mt-2">
                                <label for="body">Add Perk Information</label>
                                <textarea id="content" class="form-control" name="content" placeholder="Eg. Bob Marlin Magsaysay (5% discount)"
                                    rows="" required></textarea>
                                <div class="pt-3">
                                <label for="body">Set Date and Time for Post Expiration</label>
                                <input type="datetime-local" class="form-control" name="created_at" id="created_at"
                                                required>
                                </div>
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




