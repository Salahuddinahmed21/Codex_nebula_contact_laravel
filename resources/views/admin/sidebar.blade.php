@section('sidebar')
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="#" class="navbar-brand mx-4 mb-3">
                <img src="{{asset('user/IMG/logo.png')}}" alt="no img found" width="200px">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                       
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('ADMIN_Name')}}</h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('userIndex')}}" class="dropdown-item">Users Details</a>
                            <a href="{{route('UserRegister')}}" class="dropdown-item">User Registration</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link"><i class="fa fa-pen me-2"></i>Query</a>
                  
                </div>
            </nav>
        </div>
@endsection