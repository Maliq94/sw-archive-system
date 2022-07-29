@extends('layouts.new_layout')
@section('content')
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <span class="text-danger pe-3 font-weight-bolder">بيانات إدخال الصوتية | <a class="badge bg-gradient-success" href="/">العودة للرئيسية</a></span>
             
      <form action="/add-audio" method="POST" enctype="multipart/form-data" class="row g-3">
         @csrf
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label fs-6">الشيخ</label>
            <select name="scholar" class="form-select">
              @foreach($scholars as $t)
              <option value="{{$t->id}}">{{$t->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputPassword4" class="form-label fs-6">الفن</label>
            <select name="fn" class="form-select">
              @foreach($fn as $t)
              <option value="{{$t->id}}">{{$t->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputPassword4" class="form-label fs-6">النوع</label>
            <select name="type" class="form-select">
              @foreach($types as $t)
              <option value="{{$t->id}}">{{$t->type}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputPassword4" class="form-label fs-6">البرنامج</label>
            <select name="program" class="form-select">
              @foreach($programs as $t)
              <option value="{{$t->id}}">{{$t->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-4">
            <label for="inputAddress" class="form-label fs-6">وصف</label>
            <input type="text" class="form-control" name="desc" placeholder="الوصف هنا">
          </div>
          <div class="col-2">
            <label for="inputAddress" class="form-label fs-6">رقم الدرس</label>
            <input type="number" class="form-control" name="episode">
          </div>
          <div class="col-2">
            <label for="inputAddress" class="form-label fs-6">الصوتية</label>
            <input type="file" class="form-control" name="file" placeholder="الوصف هنا">
          </div>
     
          <div class="col-12">
            <button type="submit" class="btn btn-primary">إضافة صوتية</button>
          </div>
        </form>
            </div>
          </div>
        </div>
      
      </div>




   
    </div>
  @endsection