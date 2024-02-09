@extends('user/masterlayout')
@section('content')
<link rel="stylesheet" href="{{asset('user/CSS/style.css')}}">
<div class="container">
        <div class="box" id="box">
        <form  method="POST" action="{{route('ClientStores')}}" class="form">
               @csrf               
                <div class="input-control">
                    <label for="fullname"><b>Name</b></label>
                    <input type="text" id="fullname" name="name">
                    <div class="error">
                    </div>
                </div>
                <div class="input-control">
                    <label for="email"><b>E-mail</b></label>
                    <input type="text" id="email" name="email">
                    <div class="error">
                    </div>
                </div>
                <div class="input-control">
                    <label for="phonenumber"><b>Phone-Number</b></label>
                    <input type="text" id="phonenumber" name="phonenumber">
                    <div class="error">
                    </div>
                </div>
                <div class="input-control">
                    <label for="country"><b>Country</b></label>
                    <input type="text" id="country" name="country">
                    <div class="error">
                    </div>
                </div>
                <button type="submit"><b>SUBMIT</b></button>
                <input type="reset" class="reset" value="RESET">
            </form>
        </div>
        <div class="image-container">
            <img src="{{asset('user/IMG/logo.png')}}" alt="no image found" id="img">
        </div>
    </div>

<script src="{{asset('user/JS/script.js')}}"></script>
@endsection