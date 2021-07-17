@extends('layouts.app')  

@section('content')  

<div class="container">  
  
    <h3>Edit Post</h3>  
    <form action="{{ url('/post/' . $row->post_id) }}" method="POST">  
        <input name="_method" type="hidden" value="PATCH">
        @csrf  
        <div class="form-group">
            <label for="">DATE</label>
            <input type="text" name="post_date" class="form-control" value="{{ $row->post_date }}">
        </div>
        <div class="form-group">
            <label for="">SLUG</label>
            <input type="text" name="post_slug" class="form-control" value="{{ $row->post_slug }}">
        </div>
        <div class="form-group">
            <label for="">TITLE</label>
            <input type="text" name="post_title" class="form-control" value="{{ $row->post_title }}">
        </div>
        <div class="form-group">
            <label for="">TEXT</label>
            <input type="text" name="post_text" class="form-control" value="{{ $row->post_text }}">
        </div>
        <div class="form-group">
            <input type="submit" value="UPDATE" class="btn btn-primary">
        </div>          
    </form>  
</div>  

@endsection  