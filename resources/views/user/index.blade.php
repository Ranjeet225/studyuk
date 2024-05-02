@extends('admin.include.app')
@section('main-content')
@if (Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert">
              <i class="fa fa-times"></i>
          </button>
          <strong>Success !</strong> {{ session('success') }}
      </div>
@endif
<div class="main-content">
  <div class="row">
    <div class="card card-buttons">
      <div class="card-body">
        <div class="row">
          <div class="col-md-9">
            <ol class="breadcrumb text-muted mb-0">
              <li class="breadcrumb-item">
                <a href="#"> Home</a>
              </li>
              <li class="breadcrumb-item text-muted"> Users</li>
            </ol>
          </div>
           <div class="col-md-3">
            <div class="col-auto float-end ms-auto">
              <a href="{{url('admin-management/users/create')}}"   class="btn add-btn">
                <i class="fa-solid fa-plus"></i> Add User </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="row ">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped custom-table mb-0">
        <thead>
          <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Account Type</th>
            <th>Status</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as  $user)
          <tr>
            <td>
              <a href="#">{{$user->id}}</a>
            </td>
            <td>
              <a href="#">{{$user->name}}</a>
            </td>
            <td> {{$user->admin_type}}</td>
            <td>
              @if($user->status ==1)
              <span class="badge bg-inverse-success">{{'Active'}}</span>
              @else
              <span class="badge bg-inverse-warning">{{'InActive'}}</span>
              @endif
            </td>
            <td class="text-end">
              <div class="dropdown dropdown-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" >
                  <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{url('admin-management/users/edit')}}/{{$user->id}}">
                    <i class="fa-solid fa-pencil m-r-5"></i> Edit
                  </a>
                  <a class="dropdown-item" href="{{url('admin-management/users/edit')}}/{{$user->id}}">
                    <i class="la la-trash"></i> Delete
                  </a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </div>

</div>
@endsection


