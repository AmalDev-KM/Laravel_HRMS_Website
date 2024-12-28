@extends('admin.layout')
@section('content')
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Job Roles</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add Job Roles
                        </li>
                    </ol>
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
            <div class="row g-4"> <!--begin::Col-->
                <div class="col-md-5"> <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Add JobRoles</div>
                        </div> <!--end::Header--> <!--begin::Form-->
                    @if ($currentjobrole)
                        <form action="{{route('admin.updatejobrole')}}" method="post" "> <!--begin::Body-->
                            <input type="hidden" name="jobrole_id" value="{{$currentjobrole->id}}">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Department</label>
                                    <select class="form-select" id="validationCustom04" name="department_id" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        @foreach ($departments as $department)
                                            <option @selected($department->id == $currentjobrole->department_id) value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('department_id')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3"> 
                                    <label for="exampleInputEmail1" class="form-label">Department name</label> 
                                    <input type="text" name="name" class="form-control" value="{{$currentjobrole->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('name')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="input-group"> 
                                    <span class="input-group-text">Description</span> 
                                    <textarea class="form-control" name="description" aria-label="With textarea">{{$currentjobrole->description}}</textarea> 
                                </div>
                                @error('description')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
                        </form> <!--end::Form-->
                        @else
                        <form action="{{route('admin.createjobrole')}}" method="post" "> <!--begin::Body-->
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Department</label>
                                    <select class="form-select" id="validationCustom04" name="department_id" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('department_id')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="mb-3"> 
                                    <label for="exampleInputEmail1" class="form-label">Job Title</label> 
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('name')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="input-group"> 
                                    <span class="input-group-text">Description</span> 
                                    <textarea class="form-control" name="description" aria-label="With textarea"></textarea> 
                                </div>
                                @error('description')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer"> 
                                <button type="submit" class="btn btn-primary">Save</button> 
                            </div> <!--end::Footer-->
                        </form> <!--end::Form-->
                    @endif
                    </div> <!--end::Quick Example--> <!--begin::Input Group-->
                </div> <!--end::Col--> <!--begin::Col-->
                <div class="col-md-7">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">View Jobroles</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobroles as $index => $jobrole)
                                        <tr class="align-middle">
                                            <td>{{$index+1}}</td>
                                            <td>{{$jobrole->name}}</td>
                                            <td>{{$jobrole->description}}</td>
                                            <td>{{$jobrole->department_name}}</td>
                                            <td>
                                                <div class="btn-group mb-2" role="group" aria-label="Basic mixed styles example">
                                                    <a href="{{route('admin.editjobrole',encrypt($jobrole->id))}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a> 
                                                    <a href="{{route('admin.deletejobrole',encrypt($jobrole->id))}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> 
                                                </div>
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
</main> <!--end::App Main--> <!--begin::Footer-->
@endsection