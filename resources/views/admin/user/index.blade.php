@extends('admin/masterlayout')
<!-- @extends('admin/navbar')
@extends('admin/sidebar')
@extends('admin/footer') -->
@section('content')          
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Users Data</h6>
                        <a class="btn btn-sm btn-primary" href="{{route('UserRegister')}}">Create</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Sr #</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">User Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td> {{$loop->iteration ?? ''}}</td>
                                    <td> {{$user->name ?? ''}}</td>
                                    <td> {{$user->email ?? ''}}</td>
                                    @if($user->user_role == 1)
                                    <td>Admin </td>
                                    @endif
                                    @if($user->user_role == 2)
                                    <td>User </td>
                                    @endif
                                    
                                    <td><a class="btn btn-sm btn-danger" href="">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            

@endsection