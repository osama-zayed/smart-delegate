<div class="modal fade" id="delete_room{{$room['id']}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('rooms.destroy',$room['id'])}}" method="post">
           @method('delete')
           @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">Deleteb room</h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>Room Name <span class="text-danger">{{$room['data']['roomName']}}</span></p>
                   <input type="hidden" name="id" value="{{$room['id']}}">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-primary"
                               data-dismiss="modal">cloce</button>
                       <button type="submit"
                               class="btn btn-danger">Delete</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
