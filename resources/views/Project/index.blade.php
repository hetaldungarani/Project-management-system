@extends('layouts.app')

@section('content')
<div class="container">
<div id="datatable1_wrapper" class="dataTables_wrapper" role="grid">
    <div class="row">                    
        <div class="container-fluid">
            <h3 class="customer-title">
                <a href="{{route('projects.create')}}" class="btn btn-primary">Add Project</a> 
            </h3>
            @if (Session::has('success'))
            <div class="alert alert-success">{!! Session::get('success') !!}</div>
            @endif
         
        </div>
        <div class="col-md-12">                           
            <div class="table-responsive" id="project_container"> 
                @include('Project/list')
            </div>                
        </div>                    
    </div>
</div>
</div>
<script type="text/javascript">
 
</script>
@endsection