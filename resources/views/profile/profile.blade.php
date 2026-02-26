@extends('layouts.stisla')

@section('title', 'Profile')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>

    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <img src="{{ Auth::user()->avatar ?? asset('assets/img/avatar/avatar-1.png') }}"
                class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Posts</div>
                  <div class="profile-widget-item-value">0</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Followers</div>
                  <div class="profile-widget-item-value">6,8K</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Following</div>
                  <div class="profile-widget-item-value">0</div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
              <div class="profile-widget-name">{{ Auth::user()->name}}
                <div class="text-muted d-inline font-weight-normal">
                  <div class="slash"></div> {{ Auth::user()->email}}
                </div>
              </div>
              <div class="row ml-0">
                <p>{{ Auth::user()->email }}</p>
                <p class="ml-auto mr-3 badge bg-primary text-white d-flex align-items-center text-capitalize">
                  {{ Auth::user()->role }}</p>
              </div>
            </div>

          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="#" class="needs-validation" novalidate="">
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name}}" required="">
                    <div class="invalid-feedback">
                      Please fill in the name
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->email}}" required="">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-15 col-12">
                    <label>Current Password</label>
                    <input type="password" class="form-control" value="" required="">
                    <div class="invalid-feedback">
                      Please fill in the current password
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>New Password</label>
                    <input type="password" class="form-control" value="" required="">
                    <div class="invalid-feedback">
                      Please fill in the New Password
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Confirm Password</label>
                    <input type="text" class="form-control" value="" required="">
                    <div class="invalid-feedback">
                      Please fill in the Confirm Password
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-12">
                    <label>Bio</label>
                    <textarea class="form-control summernote-simple"></textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" onclick="confirmLog(event)">Save Changes</button>
              </div>
              <script>
                function confirmLog(event) {
                  event.preventDefault();
                  Swal.fire({
                    icon: 'error',
                    title: 'Maaf,',
                    text: "Fitur ini sedang dalam maintenance. Harap tunggu pembaruan selanjutnya.",
                  })
                }
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection