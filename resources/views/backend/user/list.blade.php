@extends('backend.layouts.app')

@section('style')
@endsection
  
@section('content')
    <div class="pagetitle">
      <h1>Users List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">


        </div>

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                @include('layouts._message')
              <h5 class="card-title">
                 Users List
                <a href="{{ url('panel/user/add') }}" class="btn btn-primary" style="float: right;margin-top: -12px;"> Add New </a>
              </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Email Varified</th>
                    <th scope="col">Status</th>
                    <th scope="col">Createrd Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($getRecord as $value)
                        <tr>
                            <th scope="row">{{ $value->id }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ !empty($value->email_verified_at) ? 'Yes' : 'No' }}</td>
                            <td>{{ !empty($value->status) ? 'Active' : 'Inactive' }}</td>
                            <td>{{ date('d-m-Y H:i ', strtotime($value->created_at))}}</td>
                            <td>
                                <a href="{{ url('panel/user/edit/'.$value->id)}}"class="btn btn-primary btn-sm">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete record?');"href="{{ url('panel/user/delete/'.$value->id)}}"class="btn btn-danger btn-sm">Delete</a>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">
                                Record not found.

                            </td>

                        </tr>
                    @endforelse
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>



        </div>
      </div>
    </section>
@endsection

@section('script')
@endsection


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 