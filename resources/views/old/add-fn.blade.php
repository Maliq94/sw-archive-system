@extends('layouts.app')

@section('content')

<br>
<H3 class="text-center">إضافة فن</H3>
<br>


<!-- FORM -->

<div class="container " style="background-color: #f3f3f3;">
<form action="/add-fn" method="POST" class="row g-3">
    @csrf
  <div class="col-12">
      <label for="inputAddress" class="form-label">الفن</label>
      <input type="text" class="form-control" name="name" placeholder="اكتب هنا">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">إضافة صوتية</button>
    </div>
  </form>
</div>
@endsection