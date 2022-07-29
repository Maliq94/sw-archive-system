@extends('layouts.new_layout')
@section('content')
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <span class="text-danger pe-3 font-weight-bolder">بيانات إدخال شيخ | <a class="badge bg-gradient-success" href="/">العودة للرئيسية</a></span>
             <br>
             <br>
              <form action="/add-scholar" method="POST" class="row g-3">
                @csrf
              <div class="col-6">
                  <label for="inputAddress" class="form-label fs-6">اسم الشيخ</label>
                  <input type="text" class="form-control" name="name" placeholder="اكتب هنا">
                </div>
                <div class="col-6">
                  <label for="inputAddress" class="form-label fs-6">الرمز</label>
                  <input type="text" class="form-control" name="code" placeholder="اكتب هنا">
                </div>
           
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">إضافة </button>
                </div>
              </form>
      
            </div>
          </div>
        </div>
      
      </div>




   
    </div>
  @endsection