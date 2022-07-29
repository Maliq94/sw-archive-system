@extends('layouts.app')

@section('content')   
        <br>
        <H3 class="text-center">إدارة البرامج</H3>
        <br>
    

    <!-- FORM -->

    <div class="container " style="background-color: #f3f3f3;">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم البرنامج</th>
            <th scope="col">حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($programs as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td><a href="\del-prog\{{$p->id}}">حذف</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  <a href="/add-program" class="btn btn-success">اضافة</a>

      
      
    </div>

    @endsection