<div class="modal fade" id="EnableUser{{$user['id']}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('user.update',$user['name'])}}" method="post">
           @method('put')
           @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">تفعيل المستخدم</h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>اسم المستخدم <span class="text-danger">{{$user['name']}}</span></p>
                   <input type="hidden" name="id" value="{{$user['id']}}">
                   <input type="hidden" name="user_status" value="1">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">اغلاق</button>
                       <button type="submit"
                               class="btn btn-success">تفعيل</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
