@extends('user/masterlayout')
@section('content')
<script src="{{asset('https://code.jquery.com/jquery-3.6.4.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css')}}">
    <script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('user/CSS/index.css')}}">
   <!-- navbar -->
   <nav>
        <ul>
            <li><button onclick="goBack()">Back</button></li>
            <li><img src="{{asset('user/IMG/logo.png')}}" alt="no img found"></li>
            <span>
                <li>Tell Us How To Implement Your Idea!</li>
            </span>
        </ul>
    </nav>
    <!-- end of navbar -->
   
    <section class="main_page p-3 pl-0 pr-0">
        <div class="container-fluid">
        <form id="myform" method="POST" action="{{route('ClientDetailStore')}}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <input type="hidden" id="test" name="formDataListName" value="forList">
            <input type="hidden" id="images" name="image" value="forList">
            <div class="col-md-10" >
              <div class="card p-2" style="background-color: #1D1A20;border-color: #7242D2;">
                <h1 style="color: #fff; font-size: 40px;">Pictures</h1>
                <div id="image-preview"></div>
                              
                </div>
              </div>
              
              <div class="col-md-2" >
                <div class="card p-2" style="background-color: #1D1A20;border-color: #7242D2;">
                    <div class="card" id="formsDiv" style="background-color: #1D1A20" >
                      <input type="file" id="image-input" name="image-input" class="ibox" multiple="" onchange="previewImages()">

                    </div>
                </div>
            </div>
          </div>
            <div class="row">
                <div class="col-md-12" >
                    <div class="card p-2" style="background-color: #1D1A20;border-color: #7242D2;">
                      <h1 style="color: #fff; font-size: 40px;">Features</h1>
                      <div class="dynamicForm" style="background-color: #1D1A20">
                            <div id="imageDiv" class="card"></div>
                            <div id="formDiv" class="card" >
                                
                            </div>
                            <br>
                            <div class="btn btn-primary"  style="background-color: #7242D2;color: #fff;border-color: #7242D2;" id="addForm" onclick="addForm()">+</div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-4" >
                  </br>
                    <div class="container" id="tparty">
                        <div class="list"><h2>Do you want to integrate third party?</h2>
                          <div class="tpint" onclick="toggleInput(true)">YES</div>
                          <div class="nobutton tpint" id="nobtn"  onclick="toggleInput(false)">NO</div>
                          <input type="text" name="tpintegration" id="thirdPartyInput" placeholder="e.g paypal"></div>
                        </div> 
                  </div>
                <div class="col-md-4" >
                  <div class="date">
                    <p>When do you want the project to start?</p>
                    <input type="text" name="sdate" id="startDatePicker" placeholder="Select the starting date">
                    <p>When do you want the project to end?</p>
                    <input type="text" name="edate" id="endDatePicker" placeholder="Select the ending date" style="background-color: #1D1A20;">
                  </div>
                  <!-- end of date picker -->
                </div>
                <div class="col-md-4" >
                    <div class="card" style="margin-top: 10px; background-color: #1D1A20;color: #fff;border-color: #7242D2;">
                        <div class="card-body">
                            <form id="myForm">
                                <div class="form-group">
                                    <input id="mappdev" type="radio" value="Mobile App Development" name="technology"/>
                                    <label for="mappdev">Mobile App Development</label><br>
                                </div>
                                <div class="form-group">
                                    <input id="dd" type="radio" value="Desktop Development" name="technology"/>
                                    <label for="dd">Desktop Development</label><br>
                                </div>
                                <div class="form-group">
                                    <input id="cms" type="radio" value="CMS & Website Development" name="technology"/>
                                    <label for="cms">CMS & Website Development</label><br>
                                </div>
                                <div class="form-group">
                                    <input id="default" type="radio" value="We take care of it" name="technology"/>
                                    <label for="default">We take care of it</label><br>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <center>
                    <div class="submitDiv" >
                        <button class=" btn btn-DEFAULT" style="WIDTH:25%;background-color: #7242D2; color: #fff;border-color: #7242D2;border-radius: 100PX;" onclick="submitData()">SUBMIT</button>
                    </div></center>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>
  <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  <script src="{{asset('user/JS/index.js')}}"></script>
@endsection