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

@section('offcanvas')
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
  <div class="sidebar-headerset">
    <div class="sidebar-headersets">
      <h2>Customizer</h2>
      <h3>Customize your overview Page layout</h3>
    </div>
    <div class="sidebar-headerclose">
      <a data-bs-dismiss="offcanvas" aria-label="Close"><img src="{{asset('assets/img/close.png')}}" alt="Close Icon"></a>
    </div>
  </div>
  <div class="offcanvas-body p-0">
    <div data-simplebar="" class="h-100">
      <div class="settings-mains">
        <div class="layout-head">
          <h5>Layout</h5>
          <h6>Choose your layout</h6>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-check card-radio p-0">
              <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
              <label class="form-check-label avatar-md w-100" for="customizer-layout01">
                <img src="{{asset('assets/img/vertical.png')}}" alt="Layout Image">
              </label>
            </div>
            <h5 class="fs-13 text-center mt-2">Vertical</h5>
          </div>
          <div class="col-6">
            <div class="form-check card-radio p-0">
            <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
              <label class="form-check-label  avatar-md w-100" for="customizer-layout02">
                <img src="{{asset('assets/img/horizontal.png')}}" alt="Layout Image">
              </label>
            </div>
            <h5 class="fs-13 text-center mt-2">Horizontal</h5>
          </div>

          </div>
      </div>
    </div>

  </div>
</div>
@endsection
