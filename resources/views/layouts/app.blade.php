<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انواع المواد</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
  button{
      margin: 0px 8px;
  }
  
  #sidebar{
    display:flex;
    padding: 15px;
    background-color: #181818;
    flex-direction: column;
  }

  .menuitem{
    text-decoration: none;
    background-color: rgb(255, 255, 255);
    color:#016f77;
    padding: 10px 15px;
    text-align: right;
    font-weight: bold;
    margin: 5px 0px;
    transition: .4s all;
  }

  .menuitem:hover{
    padding: 10px 25px;

  }

</style>

<body>

  <div class="container-fluid vh-100">
    <div class="row vh-100">
    <div id="sidebar" class="col col-lg-2" style="">
      <h5 class="text-white">منظومة أرشفة إذاعة طريق السلف</h5>
      <a href="/" class="menuitem"><i class="bi bi-house-door"></i> الرئيسية</a>
      <a href="/view-audio" class="menuitem"><i class="bi bi-cassette"></i> إدارة الصوتيات</a>
      <a href="/view-scholars" class="menuitem"><i class="bi bi-person-workspace"></i> إدارة المشائخ</a>
      <a href="/view-fn" class="menuitem"><i class="bi bi-blockquote-left"></i> إدارة الفنون</a>
      <a href="/view-types" class="menuitem"><i class="bi bi-file-spreadsheet"></i> إدارة الأنواع</a>
      <a href="/view-programs" class="menuitem"><i class="bi bi-soundwave"></i> إدارة البرامج</a>
    </div>

    <div class="col col-lg-10">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
        

            <div class="collapse navbar-collapse" id="navbarNav"> 
                <button type="button" class="btn btn-dark">الرئيسية</button>
                <button type="button" class="btn btn-success">إدارة المشائخ</button>
                
            </div>
        </div>
    </nav>


    @yield('content')
  </div>
</div>
</div>

</body>

</html>