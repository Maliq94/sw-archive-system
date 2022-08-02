@extends('layouts.new_layout')
@section('content')
<!-- End Navbar -->
<div class="container-fluid py-4">

  <div class="row mt-4">
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">

              <input type="text" id="search" class="form-control" placeholder="اكتب اسم الملف هنا" value="">
            </div>
            <div class="col-4">
              <input type="button" class="form-control btn btn-primary fs-6 py-2" value="بحث">
            </div>
          </div>

          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"></th>
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
              <tbody id="tablebody">


                



              </tbody>
            </table>
          </div>



        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
         

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
              <tbody id="pl-table">
                <td>
                  جاري التحميل
                </td>
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

    get_url = "{{url('/')}}";
    playlist_id = "{{$playlist_id}}";

    //get playlist info
    function getPlaylistData() {  

    $.get(get_url+'/getplaylistitems/'+playlist_id,
      function (data, textStatus, jqXHR) {

        if(textStatus=='success'){
          $('#pl-table').html('');
          data.forEach(i => {
            $('#pl-table').append("<tr><td><img src='{{ asset('storage/public/assets') }}/img/audio.jpg' class='avatar avatar-sm ms-3'alt='user1'></td><td class='font-weight-bold fs-6 mb-0'>"+ i['desc'] +"</td><td class='text-xs font-weight-bold mb-0'>"+ i['scholar'] +"</td></tr>");
          })

        }
      },
    );

  };

  getPlaylistData();
    //-------------------

    //add to playlist function
    function addToPlaylist(id,pid){
      $.get(get_url+'/addaudiotopl-api/'+id+"/"+pid,
        function (data, textStatus, jqXHR) {
          if(textStatus=='success'){
            getPlaylistData();
          }
        },
      );
    }

    //search function 
    console.log(get_url);

    $('#search').on('change keyup', function () {
      seacrh_val = $('#search').val();
      $.get(get_url+'/get-audio/'+seacrh_val,
        function (data, textStatus, jqXHR) {

          if(textStatus=='success'){

            $('#tablebody').html('');
            data.forEach(i => {
              $('#tablebody').append("<tr><td><img src='{{ asset('storage/public/assets') }}/img/audio.jpg' class='avatar avatar-sm ms-3'alt='user1'></td><td class='font-weight-bold fs-6 mb-0'>"+ i['desc'] +"</td><td class='text-xs font-weight-bold mb-0'>"+ i['scholar'] +"</td><td><button class='btn btn-primary py-2' onclick='addToPlaylist("+i['id']+","+playlist_id+")'>اضافة</a></td></tr>");
            });

          }
        }
      );
    });
    //-------------------
    

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