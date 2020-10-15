<div style="overflow-x: auto;">
    <table id="datatable1" class="table table-bordered table-striped dataTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Project Assign To</th>
                <th></th>
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
                <td><a href="{{URL('submit_project/'.$project->id )}}">Submit Project</a></td>

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
