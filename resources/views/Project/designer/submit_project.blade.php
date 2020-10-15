@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 " style="padding-left: 100px ">
        <h2>Add Files</h2>  
        {!! Form::open(array('method'=>'POST', 'files'=>true)) !!}

        <section class="box-typical box-typical-padding" >
            <section>
                
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('Images') !!}                       
                            <input type="file" name="filename[]" multiple required>
                            {!! $errors->first('images', '<p class="alert alert-danger">:message</p>') !!}
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


        

@endsection