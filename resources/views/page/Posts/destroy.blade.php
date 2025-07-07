<div class="modal fade" id="delete_post{{$post['id']}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('posts.destroy',$post['id'])}}" method="post">
           @method('delete')
           @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">Delete post</h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>Delete <span class="text-danger">Post</span></p>
                   <input type="hidden" name="id" value="{{$post['id']}}">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-primary"
                               data-dismiss="modal">cloce</button>
                       <button type="submit"
                               class="btn btn-danger">delete</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
