@extends('hr.layout')
@section('content')
    <main class="app-main"> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Employee Approval</h3>
                    </div>
                    <div class="col-sm-6">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content Header--> <!--begin::App Content-->
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row g-4"> <!--begin::Col--> <!--end::Col--> <!--begin::Col-->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Approve Employee</h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Date of birth</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Employees as $index => $Employee)
                                            <tr class="align-middle">
                                                <td>{{ $index + 1 }}</td>
                                                <td>

                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0"> <img style="width: 100px" src="{{asset('storage/images/'.$Employee->profile_picture)}}" alt="User Avatar" > </div>
                                                        
                                                    </div>

                                                </td>
                                                <td>{{ $Employee->first_name . ' ' . $Employee->last_name }}</td>
                                                <td>{{ $Employee->email }}</td>
                                                <td>{{ $Employee->phone }}</td>
                                                <td>{{ $Employee->address }}</td>
                                                <td>{{ $Employee->dob }}</td>
                                                <td>{{ $Employee->gender }}</td>

                                                <td> 
                                                    @if ($Employee->status == 0)
                                                        <a href="{{route('hr.Employeedetails',encrypt($Employee->id))}}" class="btn btn-success">
                                                            <span>Show Details>></span>
                                                            <ion-icon name="checkmark-done"></ion-icon>
                                                        </a>
                                                    @else
                                                        <a href="#" class="btn btn-danger"><i
                                                                class="fa-solid fa-ban"></i>
                                                            <p>Reject</p>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- /.card-body -->
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Active Hr Employees</h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Date of birth</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activeEmployees as $index => $activeEmployee)
                                            <tr class="align-middle">
                                                <td>{{ $index + 1 }}</td>
                                                <td>

                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0"> <img style="width: 100px" src="{{asset('storage/images/'.$activeEmployee->image)}}" alt="User Avatar" > </div>
                                                        
                                                    </div>

                                                </td>
                                                <td>{{ $activeEmployee->firstname . ' ' . $activeHr->lastname }}</td>
                                                <td>{{ $activeEmployee->email }}</td>
                                                <td>{{ $activeEmployee->phone }}</td>
                                                <td>{{ $activeEmployee->address }}</td>
                                                <td>{{ $activeEmployee->dob }}</td>
                                                <td>{{ $activeEmployee->gender }}</td>

                                                <td>
                                                    @if ($activeEmployee->status == 2)
                                                        <a href="{{route('admin.doapproveHr',encrypt($activeEmployee->id))}}" class="btn btn-danger">
                                                            <span>Reject </span>
                                                            <ion-icon name="close-outline"></ion-icon>
                                                        </a>
                                                    @else
                                                        <a href="#" class="btn btn-danger"><i
                                                                class="fa-solid fa-ban"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- /.card-body -->
                        </div>
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    </main>
@endsection
