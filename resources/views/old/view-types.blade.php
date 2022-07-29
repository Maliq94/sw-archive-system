@extends('layouts.app')

@section('content')
        <br>
        <H3 class="text-center">إدارة أنواع المواد</H3>
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
          @foreach($types as $s)
          <tr>
            <td>{{$s->id}}</td>
            <td>{{$s->type}}</td>
            <td><a href="\del-type\{{$s->id}}">حذف</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  <a href="/add-type" class="btn btn-success">اضافة</a>

      
      
    </div>

    @endsection