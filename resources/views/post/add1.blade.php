@extends('layouts.app')  

@section('content')  

<div class="container">  
  
    <h3>Tambah Post</h3>  
    <form action="{{ url('/post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">DATE</label>
            <input type="text" name="post_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="">SLUG</label>
            <input type="text" name="post_slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="">TITLE</label>
            <input type="text" name="post_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">TEXT</label>
            <input type="text" name="post_text" class="form-control">
        </div>   
        <div class="form-group">
            <input type="submit" value="SIMPAN" class="btn btn-primary">
        </div>       
    </form>  
</div>  
  
@endsection