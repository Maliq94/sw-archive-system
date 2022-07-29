@extends('layouts.app')

@section('content')
        <br>
        <H3 class="text-center">إدارة المشائخ</H3>
        <br>
    

    <!-- FORM -->

    <div class="container " style="background-color: #f3f3f3;">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الشيخ</th>
            <th scope="col">الرمز</th>
            <th scope="col">حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($scholars as $s)
          <tr>
            <td>{{$s->id}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->code}}</td>
            <td><a href="\del-scholar\{{$s->id}}">حذف</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  <a href="/add-scholar" class="btn btn-success">اضافة</a>

      
      
    </div>

    @endsection