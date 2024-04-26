@extends('admin.include.app')
@section('main-content')
  <div class="main-content" >
    <div class="row">
      <div class="card card-buttons">
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">
              <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item">
                  <a href="#"> Welcome</a>
                </li>
                <li class="breadcrumb-item text-muted">Edit User</li>
              </ol>
            </div>
            <div class="col-md-3">
              <p class="subheader_left"> Overseas Education Lane</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Header -->
  <div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form action="{{url('admin-management/users/update')}}/{{$users->id}}" method="Post">
            @csrf
            <div class="row">
              <div class="col-md-3">
                <input type="text" class="form-control formmrgin" name="name" value="{{$users->name}}" placeholder="Name">
              </div>

              <div class="col-md-3">
                <input type="text" class="form-control formmrgin" name="email" value="{{$users->email}}" placeholder="Email">
              </div>

              <div class="col-md-3">
                <input type="password" class="form-control formmrgin" name="password" value="{{$users->password}}" placeholder="Enter Password">
              </div>

              <div class="col-md-3">
                <select class="txt-capital form-select formmrgin" id="status" name="status">
                  <option value="" >Status</option>
                  <option value="1" {{($users->status == 1) ? 'Selected' : ''}}>Active</option>
                  <option value="0" {{($users->status == 0) ? 'Selected' : ''}}>Inactive</option>
                </select>
              </div>        
              <div class="col-md-3">
                  @php
                      $role = (!empty($users->roles) && $users->roles->first()) ? $users->roles->first()->id : null;
                  @endphp
                  <select name="role" id="role" class="txt-capital form-select formmrgin">
                      <option value="">Select Role</option>
                      @foreach($roles as $roleId => $roleName)
                          <option value="{{ $roleId }}" {{$role == $roleId ? 'selected' : '' }}>{{ $roleName }}</option>
                      @endforeach
                  </select>
              </div>       
                <div class="col-md-4 col-sm-6">
                <button type="submit" class="btn btn-info d-lg-block  formmrgin" name="country_submit" value="1">Update </button>
              </div>
            </div>
          </form>
        </div>
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
      <a data-bs-dismiss="offcanvas" aria-label="Close"><img src="assets/img/close.png" alt="Close Icon"></a>
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
                <img src="assets/img/vertical.png" alt="Layout Image">
              </label> 
            </div> 
            <h5 class="fs-13 text-center mt-2">Vertical</h5> 
          </div> 
          <div class="col-6"> 
            <div class="form-check card-radio p-0"> 
            <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input"> 
              <label class="form-check-label  avatar-md w-100" for="customizer-layout02"> 
                <img src="assets/img/horizontal.png" alt="Layout Image">
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
