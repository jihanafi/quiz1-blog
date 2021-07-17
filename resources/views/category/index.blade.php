@extends('layouts.app')

@section('content')
<div class="container">   
        
         <h3>
             Category
             <a href="{{ url('/category/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
         </h3>   
        
         <table class="table table-bordered">   
                 <tr>      
                         <th>NAME</th>   
                         <th>TEXT</th> 
                         <th>EDIT</th>  
                         <th>DELET</th>  

                     </tr>   
                     @foreach($rows as $row)    
                     <tr>   
                             <td>{{ $row->category_name }}</td>   
                             <td>{{ $row->category_text }}</td>   
                             <td><a href="{{ url('category/' . $row->category_id . '/edit') }}"class="btn btn-primary btn-sm">Edit</a></td>   
                             <td> 
                                 <form action="{{ url('/category/' . $row->category_id) }}" method="POST">
                                   <input name="_method" type="hidden" value="DELETE">
                                     @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                 </form>
                             </td>   
                              
                         </tr>   
                         @endforeach   
                     </table>   
                 </div>   
                
@endsection 