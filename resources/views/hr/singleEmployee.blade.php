@extends('hr.layout')
@section('content')
    <main class="app-main"> <!--begin::App Content Top Area-->
        <div class="app-content-top-area"> <!--begin::Container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div>View Employee</div>
                    </div>
                    <div class="col-md-6 text-end"> <button type="submit" class="btn btn-primary" name="save"
                            value="create">Create Admin</button> </div>
                </div>
            </div> <!--end::Container-->
        </div> <!--end::App Content Bottom Area--> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="mb-0"> Layout Custom Area </h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $employee->first_name . ' ' . $employee->last_name }}
                            </li>
                        </ol>
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content Header--> <!--begin::App Content-->
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-6"> <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employee</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                        
                            <div class="card-body" style="display: flex; align-items: flex-start; gap: 30px; padding: 20px;">
                                <!-- Employee Details Section -->
                                <div style="flex: 1; text-align: center;">
                                    <img src="{{ asset('storage/images/' . $employee->profile_picture) }}"
                                        alt="Employee Profile Picture"
                                        style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover; border: 2px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    
                                    <h4 style="margin: 10px 0; font-weight: bold; color: #333;">{{ $employee->first_name }} {{ $employee->last_name }}</h4>
                                    
                                    <p style="margin: 5px 0; color: #666;">Email: {{ $employee->email }}</p>
                                    <p style="margin: 5px 0; color: #666;">Phone: {{ $employee->phone ?? 'Not Provided' }}</p>
                                    <p style="margin: 5px 0; color: #666;">Address: {{ $employee->address ?? 'Not Provided' }}</p>
                                    <p style="margin: 5px 0; color: #666;">Blood Group: {{ $employee->blood_group ?? 'Not Provided' }}</p>
                                    <p style="margin: 5px 0; color: #666;">Gender: {{ $employee->gender ?? 'Not Provided' }}</p>
                                </div>
                        
                                <!-- Form Section -->
                                <div style="flex: 1; max-width: 400px;">
                                    <form action="" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
                                        @csrf
                        
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <select name="department" id="department" class="form-control" required>
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                                <!-- Add other departments dynamically as needed -->
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="job_role">Job Role</label>
                                            <select name="job_role" id="job_role" class="form-control" required>
                                                <option value="">Select Job Role</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Analyst">Analyst</option>
                                                <!-- Add other job roles dynamically as needed -->
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="number" name="salary" id="salary" class="form-control" placeholder="Enter Salary" required>
                                        </div>
                        
                                        <div class="form-group" style="display: flex; justify-content: space-between;">
                                            <button type="submit" class="btn btn-success" style="width: 48%;">Approve</button>
                                            <a href="" class="btn btn-danger" style="width: 48%;">Reject</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                         <!-- /.card -->
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content--> <!--begin::App Content Bottom Area-->
        <div class="app-content-bottom-area"> <!--begin::Container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div>App Content Bottom Area</div>
                    </div>
                    <div class="col-md-6 text-end"> <button type="submit" class="btn btn-secondary" name="save"
                            value="create">Refresh</button> </div>
                </div>
            </div> <!--end::Container-->
        </div> <!--end::App Content Bottom Area-->
    </main>
@endsection
