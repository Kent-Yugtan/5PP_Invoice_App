@extends('layouts.user')
@section('content-dashboard')
@inject('profile', 'App\Http\Controllers\user\ProfileController')
<div class="container-fluid px-4">
  <h1 class="mt-4">Current Profiles</h1>
  <ol class="breadcrumb mb-4"></ol>

  <div class="row">
    <div class="col">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1">
              {{$profile->count_active() ? $profile->count_active() : 0 ;}}
            </Label>
          </div>
          <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Active Profiles
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between"></div>
      </div>
    </div>
    <div class="col">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1">
              {{$profile->count_inactive() ? $profile->count_inactive() : 0 ;}}
            </Label>
          </div>
          <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Inactive
            Profiles</div>
        </div>
        <div class="d-flex align-items-center justify-content-between"></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col ">
      <div class="input-group ">
        <input id="search" name="search" type="text" class="form-control form-check-inline" placeholder="Search">
        <button class="btn" style=" color:white; background-color: #CF8029;width:30%" id="button-submit">Search</button>
      </div>
      </form>
    </div>
  </div>

  <div class="row pt-3">
    <div class="col">
      <div class="card mb-5">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Current Profile
        </div>
        <div id="tbl_user_wrapper" class="card-body table-responsive">
          <table style=" color: #A4A6B3; " class="table table-hover" id="tbl_user">
            <thead>
              <tr>
                <th>User</th>
                <th>Status</th>
                <th>Phone Number</th>
                <th>Position</th>
                <th>Latest Invoice</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <div style="display: flex; justify-content: space-between;">
            <div class="page_showing" id="tbl_user_showing"></div>
            <ul class="pagination pagination-sm" id="tbl_user_pagination"></ul>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>


@endsection