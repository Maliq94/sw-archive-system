@extends('layouts.new_layout')
@section('content')
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <span class="text-danger pe-3 font-weight-bolder">قائمة الفنون | <a class="badge bg-gradient-success fs-6" href="/add-fn">إضافة فن</a></span>


              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">اسم الفن</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">حذف</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($fn as $p)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('storage/public/assets') }}/img/logo-ct-dark.png" class="avatar avatar-sm ms-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$p->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="/del-fn/{{$p->id}}">
                          <span class="badge badge-sm bg-gradient-danger" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">حذف</span>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>



            </div>
          </div>
        </div>
      
      </div>




   
    </div>
  @endsection