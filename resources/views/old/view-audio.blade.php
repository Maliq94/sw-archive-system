@extends('layouts.app')

@section('content')   
        <br>
        <H3 class="text-center">إدارة الصوتيات</H3>
        <br>
    

    <!-- FORM -->

    <div class="container " style="background-color: #f3f3f3;">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">وصف</th>
            <th scope="col">الشيخ</th>
            <th scope="col">الفن</th>
            <th scope="col">النوع</th>
            <th scope="col">البرنامج</th>
            <th scope="col">اسم الملف</th>
            <th scope="col">حذف</th>
            <th scope="col">حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($audio as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->desc}}</td>
            <td>{{$p->scholar->name}}</td>
            <td>{{$p->fn->name}}</td>
            <td>{{$p->type->type}}</td>
            <td>{{$p->program->name}}</td>
            <td>{{$p->file}}</td>
            <td><audio controls>
              <source src="{{ asset('storage/public/sw/'.$p->file) }}" type="audio/mpeg" />
            </audio></td>
            <td><a href=""><i style="color: red;font-size: 25px;" class="bi bi-file-earmark-x"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  <a href="/add-audio" class="btn btn-success">اضافة</a>

      
      
    </div>

    @endsection