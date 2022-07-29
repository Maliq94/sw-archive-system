@extends('layouts.app')

@section('content')

   
<br>
<H3 class="text-center">إدارة الفنون</H3>

<br>

<!-- FORM -->
<div class="container " style="background-color: #f3f3f3;">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">النوع</th>
        <th scope="col">حذف</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fn as $s)
      <tr>
        <td>{{$s->id}}</td>
        <td>{{$s->name}}</td>
        <td><a href="\del-fn\{{$s->id}}">حذف</a></td>
      </tr>
      @endforeach
    </tbody>
  </table> 
  <a href="/add-fn" class="btn btn-success">اضافة</a>

  


  
  
</div>    
@endsection