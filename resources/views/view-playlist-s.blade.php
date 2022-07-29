@extends('layouts.new_layout')
@section('content')
<!-- End Navbar -->
<div class="container-fluid py-4">

  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <span class="text-danger pe-3 font-weight-bolder">بيانات إدخال الصوتية | <a
              class="badge bg-gradient-success fs-6" href="/add-audio">إدخال صوتية</a></span>

          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">الوصف</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">الشيخ</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">البرنامج
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">رقم الحلقة
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">الفن</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">النوع</th>
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">استماع</th>
                </tr>
              </thead>
              <tbody>
                @foreach($playlist as $p)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="{{ asset('storage/public/assets') }}/img/audio.jpg" class="avatar avatar-sm ms-3"
                          alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$p->desc}}</h6>
                        <p class="text-xs text-secondary mb-0">{{ asset('storage/public/sw/') }}/{{$p->file}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$p->scholar}}</p>
                    <p class="text-xs text-secondary mb-0">حفظه الله</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$p->program}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$p->episode}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$p->fn}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$p->type}}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <a href="#">
                      <span class="badge badge-sm bg-gradient-success" onclick="">سماع</span>
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

  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <span class="text-danger pe-3 font-weight-bolder">بيانات إدخال الصوتية | 
            <a class="badge bg-gradient-success fs-6" href="#" onclick="addtoRB()">إدخال صوتية</a>
          </span>
          <div id="rbdiv"></div>




        </div>
      </div>
    </div>

  </div>





</div>

<script>

  // function addtoRB(uri) {
  //   // var html = '<html><head></head><body>ohai</body></html>';
  //   // var uri = "data:text/html," + encodeURIComponent(html);
  //   var newWindow = window.open(uri);
  // }

  function addtoRB() {  
  arr = JSON.parse('{!!$playlist!!}');
  fileUrl = '{{ asset('storage/public/sw/') }}';
  rbUrl = 'http://127.0.0.1:9001/?pass=DYuYbM2SSm&action=inserttrack&filename=';
  $('#rbdiv').html('');
  
  arr.forEach((item, i) => {
    $.get(rbUrl+fileUrl+'/'+item['file']+'&pos=-2',
      function (data, textStatus, jqXHR) {
      // $('#rbdiv').append('<h6>' + item['file']+' / تمت الاضافة' + '</h6>');
      if(textStatus=='success'){
        $('#rbdiv').append('<h6>'+'تم اضافة' + ' (' + item['desc']+')</h6>');
      }
      },
      
    );
    
  });
};

</script>


@endsection