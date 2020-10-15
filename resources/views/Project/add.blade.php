@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 " style="padding-left: 100px ">
        <h2>Add Project</h2>  
        {!! Form::open(array('route' => ('projects.store'),'method'=>'POST', 'files'=>true)) !!}

        <section class="box-typical box-typical-padding" >
            <section>
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('Title') !!}                       
                            {!! Form::text('title', null, array('class' => 'form-control','required'=>'required')) !!}
                            {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('Description') !!}                       
                            {!! Form::textarea('description', null, array('class' => 'form-control description')) !!}
                            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('Images') !!}                       
                            <input type="file" name="filename[]" multiple required>
                            {!! $errors->first('images', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
               
              
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('Due Date') !!}                       
                            {!! Form::text('due_date', null, array('class' => 'form-control date','required'=>'required')) !!}
                            {!! $errors->first('due_date', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
              
                
                   <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('Project Assign To') !!}                       
                            {!! Form::select('assign_project_to', $users, '', ['class' => 'form-control m-bot15']) !!}
                            {!! $errors->first('assign_project_to', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <section class="proj-page-add-txt table-margin form-buttons">
                    <fieldset class="form-group">
                        {!! Form::submit('Add') !!}
                        <div class="clear"></div>

                    </fieldset>
                </section>

            </section>
        </section>
        {!! Form::close() !!}
    </div>
</div>
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script type="text/javascript">
     $('.date').datepicker({  
       format: 'dd-mm-yyyy'
     });  
   tinymce.init({
        selector:'textarea.description',
        width: 900,
        height: 300
    });
        
</script>
@endsection