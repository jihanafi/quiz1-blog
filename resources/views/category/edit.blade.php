@extends('layouts.app')  

@section('content')  

<div class="container">  
  
    <h3>Edit Category</h3>  
    <form action="{{ url('/category/' . $row->category_id) }}" method="POST">  
        <input name="_method" type="hidden" value="PATCH">
        @csrf  
        <div class="form-group">
            <label for="">NAME</label>
            <input type="text" name="category_name" class="form-control" value="{{ $row->category_name }}">
        </div>
        <div class="form-group">
            <label for="">TEXT</label>
            <input type="text" name="category_text" class="form-control" value="{{ $row->category_text }}">
        </div>
        <div class="form-group">
            <input type="submit" value="UPDATE" class="btn btn-primary">
        </div>          
    </form>  
</div>  

@endsection  