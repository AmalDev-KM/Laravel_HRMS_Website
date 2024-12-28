@extends('admin.layout')
@section('content')
    <main class="app-main"> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">HR Approval</h3>
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
                                <h3 class="card-title">Approve HR</h3>
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
                                        @foreach ($Hrs as $index => $hr)
                                            <tr class="align-middle">
                                                <td>{{ $index + 1 }}</td>
                                                <td>

                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0"> <img style="width: 100px" src="{{asset('storage/images/'.$hr->image)}}" alt="User Avatar" > </div>
                                                        
                                                    </div>

                                                </td>
                                                <td>{{ $hr->firstname . ' ' . $hr->lastname }}</td>
                                                <td>{{ $hr->email }}</td>
                                                <td>{{ $hr->phone }}</td>
                                                <td>{{ $hr->address }}</td>
                                                <td>{{ $hr->dob }}</td>
                                                <td>{{ $hr->gender }}</td>

                                                <td>
                                                    @if ($hr->status == 2)
                                                        <a href="{{route('admin.doapproveHr',encrypt($hr->id))}}" class="btn btn-success">
                                                            <span>Aprove </span>
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
                                        @foreach ($activeHrs as $index => $activeHr)
                                            <tr class="align-middle">
                                                <td>{{ $index + 1 }}</td>
                                                <td>

                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0"> <img style="width: 100px" src="{{asset('storage/images/'.$activeHr->image)}}" alt="User Avatar" > </div>
                                                        
                                                    </div>

                                                </td>
                                                <td>{{ $activeHr->firstname . ' ' . $activeHr->lastname }}</td>
                                                <td>{{ $activeHr->email }}</td>
                                                <td>{{ $activeHr->phone }}</td>
                                                <td>{{ $activeHr->address }}</td>
                                                <td>{{ $activeHr->dob }}</td>
                                                <td>{{ $activeHr->gender }}</td>

                                                <td>
                                                    @if ($activeHr->status == 2)
                                                        <a href="{{route('admin.doapproveHr',encrypt($activeHr->id))}}" class="btn btn-danger">
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
