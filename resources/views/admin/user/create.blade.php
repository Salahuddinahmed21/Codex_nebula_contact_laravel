@extends('admin/masterlayout')
<!-- @extends('admin/navbar')
@extends('admin/sidebar')
@extends('admin/footer') -->
@section('content')
            <div class="col-sm-12 col-xl-8">
            <!-- Recent Sales Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Register User</h6>
                            <form method="POST" action="{{route('registeruser')}}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="user_role" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="">Select User Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                <label for="floatingSelect">User Role</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    </div>  
</div>
@endsection