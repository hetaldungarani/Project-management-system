<div style="overflow-x: auto;">
    <table id="datatable1" class="table table-bordered table-striped dataTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Project Assign To</th>
                <th>Is Completed</th>
            </tr>
        </thead>
        <tbody>
            @if(count($projects) != "")
            @foreach ($projects as $project)    
            <tr>
                <td>{{ $project->title }}</td>    
                <td>{!! $project->description !!}</td>  
                <td>{{ $project->due_date }}</td> 
                <td>{{ $project->user->name ?? '' }}</td>    
                <td>
                    @if($project->is_complete == 1)
                    <p>Yes</p>
                    @else
                    <input type="checkbox" class="{{$project->id}}" id="checkboxId_{{$project->id}}" name="is_complete" id="is_complete" value="1"<?php echo ($project->is_complete == 1 ? ' checked' : '')?>/>(Mark as Complete)
                    <button type="button" data-toggle="modal" data-target="#notes_{{$project->id}}">
                      Request For Change
                  </button>
                  <div class="modal" id="notes_{{$project->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Add Note</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                           <textarea name="notes" id="notes"></textarea>
                           <br>
                           <button onclick="AddNotes('{{$project->id}}')">Submit</button>
                        </div>

                        <div class="btn btn-success note_message" style="display: none;"></div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            @endif

        </td>

    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="5" align="center">
            No Record found
        </td>
    </tr>
    @endif
</tbody>
</table>
</div>


<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@if(count($projects) != "")
<script type="text/javascript">

    $(function() {
        $('#datatable1').DataTable({
            "paging": true,
            "aaSorting": [],
        });

        $(document).on("click", "INPUT[id^=checkboxId_]", function (event) {
           var targetId = event.target.id;
           var spit = targetId.split("_");
           var project_id = spit['1'];
           if ($("#" + targetId + ":checked").length > 0) {
             if (confirm('Are you sure ou want complete the project?')) {
               var url = '{{ url('') }}';                            
               $.ajax({
                url: url+'/ajax/complete_project?project_id=' + project_id
            }).done(function(data){
                window.location.reload();
            });
        }
        else{
           return false;
       }

   }
   else {
      return false;
  }
});
});

function AddNotes(project_id) {
    var notes = $('#notes').val();
    var url = '{{ url('') }}'; 
    $('.note_message').hide();                           
    $.ajax({
        url: url+'/ajax/project_note?project_id=' + project_id + '&notes=' + notes,
        dataType   :'JSON'
    }).done(function(data){
        if(data.success == true){
            $('.note_message').show().html('Note send Successfully.');  
            setTimeout(function(){
               window.location.reload(1);
            }, 3000);
        }

    });
}


    
</script>
@endif
