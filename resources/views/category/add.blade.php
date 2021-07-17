@extends('layouts.app')  

@section('content')  

<div class="container">  
  
    <h3>Tambah Category</h3>  
    <form action="{{ url('/category') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">NAME</label>
            <input type="text" name="category_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">TEXT</label>
            <input type="text" name="category_text" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="SIMPAN" class="btn btn-primary">
        </div>       
    </form>  
</div>  
  
@endsection