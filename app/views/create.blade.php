@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Task <small>and someday finish it!</small></h1>
    </div>

    {{ Form::open(array('url' => '/handleCreate')) }}
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" name="name" />
        </div>
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" /> Complete?
            </label>
        </div>{{ Form::submit('Add'); }}
        <!-- <input type="submit" value="Create" class="btn btn-primary" /> -->
        <a href="{{ url('/') }}" class="btn btn-link">Cancel</a>
    </form>



    {{ Form::close() }}
@stop