@extends('layouts.new_layout')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>
    <!-- End Navbar -->
    <div class="container-fluid py-4">


        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                    <h4>{{$audio['desc']}} - درس {{$audio['episode']}} - {{$audio->scholar->name}}</h4>
                    <audio id='audio_player'  style="width: 100%" controls>
                        <source src="{{asset("storage/$audio->file")}}" >
                      </audio>
                </div>
              </div>
            </div>
        </div>

                <div class="row mt-4">
          <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <span class="text-danger pe-3 font-weight-bolder">بيانات إدخال دليل إلى صوتية | <a class="badge bg-gradient-success" href="/">العودة للرئيسية</a></span>
               <br>
               <br>
               <form action="/add-audio-tag" method="POST" class="row g-3">
                @csrf
                <input type="hidden" name="audio_id" value="{{$id}}">
              <div class="col-7">
                  <label  for="inputAddress" class="form-label">الجملة المفتاحية</label>
                  <input type="text" class="form-control" name="tag_name" placeholder="اكتب هنا">
              </div>
              <div class="col-1">
                    <label for="inputAddress" class="form-label">الساعة</label>
                    <input id="hour_txt" type="number" value="00" name="hour" class="form-control" onchange="if(this.value.length < 2) this.value = '0' + this.value;">
                  </div>
              <div class="col-1">
                    <label for="inputAddress" class="form-label">الدقيقة</label>
                    <input id="minute_txt" type="number" value="00" name="minute" class="form-control" onchange="if(this.value.length < 2) this.value = '0' + this.value;">
                  </div>
                  <div class="col-1">
                      <label for="inputAddress" class="form-label">الثانية</label>
                      <input id="second_txt" type="number" value="00" name="second" class="form-control" onchange="if(this.value.length < 2) this.value = '0' + this.value;">
                    </div>
                    <div class="col-2">
                      <label for="inputAddress" class="form-label">إضافة</label>
                        <button type="submit" class="btn btn-primary form-control">إضافة </button>
                    </div>
              </form>

              </div>
            </div>
          </div>

        </div>

        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-body p-3">

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"></th>
                              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">ر.م</th>
                              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">الفائدة</th>
                              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">الزمن</th>
                              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">سماع</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($tags as $t)
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div>
                                    <img src="{{ asset('storage/assets') }}/img/audio.jpg" class="avatar avatar-sm ms-3"
                                      alt="user1">
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"></h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">{{$t->id}}</p>
                                <p class="text-xs text-secondary mb-0"></p>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-s font-weight-bold">{{$t->tag_name}}</span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $t->hour . ':' .$t->minute . ':' . $t->second}}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <a href='#' onclick="hhmmtoSeconds('{{$t->hour . ':' .$t->minute . ':' . $t->second}}')">
                                  <span class="badge badge-sm bg-gradient-success fs-6">سماع</span>
                                </a>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <a href='/del-audio-tag/{{$id}}/{{$t->id}}' >
                                  <span class="badge badge-sm bg-gradient-warning fs-7">حذف</span>
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

          <script>

            //hh mm ss to seconds



            player = document.getElementById("audio_player");
            second_txt = document.getElementById("second_txt");
            minute_txt = document.getElementById("minute_txt");
            hour_txt = document.getElementById("hour_txt");

            function hhmmtoSeconds(x){
                player = document.getElementById("audio_player");
                var a = x.split(':'); // split it at the colons
                // minutes are worth 60 seconds. Hours are worth 60 minutes.
                var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
                console.log(seconds);
                player.currentTime = seconds;
                player.play();
            }

            player.addEventListener("timeupdate", function() {
                var s = parseInt(player.currentTime % 60);
                var m = parseInt((player.currentTime / 60) % 60);
                var h  = Math.floor(player.currentTime / 3600);


                second_txt.value = s.toString().padStart(2,0);
                minute_txt.value = m.toString().padStart(2,0);
                hour_txt.value = h.toString().padStart(2,0);
                console.log(player.currentTime);

                // const result = new Date(player.currentTime * 1000).toISOString().slice(11, 19);
                // console.log(result); // 👉️ "00:10:00" (hh:mm:ss)

          }, false);

          </script>



    </div>
  @endsection
