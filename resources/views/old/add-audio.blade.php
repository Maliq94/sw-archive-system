@extends('layouts.app')

@section('content') 

        <br>
        <H3 class="text-center">إضافة صوتية</H3>
        <br>
    

    <!-- FORM -->

    <div class="container " style="background-color: #f3f3f3;">
        <form action="/add-audio" method="POST" enctype="multipart/form-data" class="row g-3">
           @csrf
          <div class="col-md-4">
              <label for="inputEmail4" class="form-label">الشيخ</label>
              <select name="scholar" class="form-select">
                @foreach($scholars as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputPassword4" class="form-label">الفن</label>
              <select name="fn" class="form-select">
                @foreach($fn as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputPassword4" class="form-label">النوع</label>
              <select name="type" class="form-select">
                @foreach($types as $t)
                <option value="{{$t->id}}">{{$t->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label for="inputPassword4" class="form-label">البرنامج</label>
              <select name="program" class="form-select">
                @foreach($programs as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-4">
              <label for="inputAddress" class="form-label">وصف</label>
              <input type="text" class="form-control" name="desc" placeholder="الوصف هنا">
            </div>
            <div class="col-4">
              <label for="inputAddress" class="form-label">الصوتية</label>
              <input type="file" class="form-control" name="file" placeholder="الوصف هنا">
            </div>
       
            <div class="col-12">
              <button type="submit" class="btn btn-primary">إضافة صوتية</button>
            </div>
          </form>
    </div>

    @endsection