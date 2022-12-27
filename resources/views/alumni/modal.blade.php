

<!-- Edit Modal -->
<div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="modalForEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <div style="center-align">
          <h5 class="modal-title" id="modalForEdit" >Edit Post</h5>
        </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('feeds.update',$item->id) }}" id="editForm">
            {!! csrf_field() !!}
            @method("PATCH")
                    <div class="row">
                        <div class="control-group col-12">
                          <input type="text" class="form-control" name="title" value="{{$item->title}}" id="title"
                                 placeholder="Enter Post Title" required>
                      </div>
                      <div class="control-group col-12 mt-2">
                          <label for="content">Content</label>
                          <textarea class="form-control" name="content"  id="content" placeholder="Enter Post Body"
                                    rows="" required>{{ old('content', $item->content) }}</textarea>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
          <a href="#"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
          <a href="feeds"><button type="submit" value="POST" class="btn btn-success">Update and save changes</button></a>
        </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  
  <!-- Delete Modal -->
<div class="modal fade" id="destroy{{$item->id}}" tabindex="-1" aria-labelledby="modalForDestroy" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <div style="center-align">
          <h5 class="modal-title" id="modalForDestroy" >Delete Post</h5>
        </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('feeds.destroy',$item->id) }}" id="editForm" accept-charset="UTF-8" style="display:inline">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
        <div class="modal-body">
                    <h4 class="text-center">Are you sure you want to this post?</h4>
                    <h5 class="text-center">Name: {{$item->title}} {{$item->content}}</h5>
            </div>
            <div class="modal-footer">
                <a href="#"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button></a>
                <button type="submit" class="btn btn-danger" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Yes</button>
                </form>
      </div>
    </div>
  </div>
  </div>

