@extends('layout')

@section('content')



	{{---- EDIT -----}}
	
	{{ Form::open(array('url' => '/handleEdit'))}}



		{{ Form::hidden('id',$task['id']); }}

		<div class='form-group'>
			{{ Form::label('name','Name') }}
			{{ Form::text('name',$task['name']); }}
		</div>
		<div class='form-group'>
			{{ Form::label('complete','Complete?') }}
			{{ Form::checkbox('complete', $task['complete'] , $task['complete']); }}
			{{ $task->complete ? 'checked' : '' }}
		</div>
<!-- 		        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" {{ $task->complete ? 'checked' : '' }} /> Complete?
            </label>
        </div> -->
<!-- {{ Form::checkbox('complete', '0', false) }} -->

<!--         <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" /> Complete?
            </label>
        </div> -->


		{{ Form::submit('Save'); }}

	{{ Form::close() }}



	@stop
