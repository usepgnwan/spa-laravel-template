<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<section class="section profile">
    <div class="row">
      <div class="col-xl-4"> 
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ $data['image'] }}" alt="Profile" class="rounded-circle img-image">
            <h2 class="profile-name">{{ $data['name'] }}</h2> 
            <div class="social-links mt-2">
              <a href="{{ $data['twitter'] }}" class="href-twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{ $data['fb'] }}" class="href-fb"><i class="bi bi-facebook"></i></a>
              <a href="{{ $data['ig'] }}" class="href-ig"><i class="bi bi-instagram"></i></a>
              <a href="{{ $data['linkedin'] }}" class="href-linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

              <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="false" role="tab" tabindex="-1">Overview</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="true" role="tab">Edit Profile</button>
              </li>

              <li class="nav-item d-none" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings" aria-selected="false" role="tab" tabindex="-1">Settings</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab" tabindex="-1">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade profile-overview" id="profile-overview" role="tabpanel">
                <h5 class="card-title">Description</h5>
                <p class="small fst-italic label-description">{{ $data['description'] }}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Company</div>
                  <div class="col-lg-9 col-md-8 label-name">{{ $data['name'] }}</div>
                </div> 

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8 label-alamat">{{ $data['alamat'] }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8 label-wa">{{ $data['wa'] }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8 label-email">{{ $data['email'] }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3 active show" id="profile-edit" role="tabpanel">

                <!-- Profile Edit Form -->
                <form enctype="multipart/form-data" action="{{ route('profile.post')}}" class="submit">
                  @method('POST')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{ $data['image'] }}" alt="Profile" class="img-image1">
                      <div class="pt-2">
                        {{-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                        <input type="file" class="form-control" name="image">
                      </div>
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name" value="{{ $data['name'] }}">
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="description" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control" id="description" style="height: 100px">{{ $data['description'] }}</textarea>
                    </div>
                  </div>   
                  <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea name="alamat" class="form-control" id="alamat" style="height: 100px">{{ $data['alamat'] }}</textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{ $data['email'] }}" required>
                    
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="wa" class="col-md-4 col-lg-3 col-form-label">No Telp / Wa</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="wa" type="wa" class="form-control" id="wa" value="{{ $data['wa'] }}" required>
                    
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="ig" class="col-md-4 col-lg-3 col-form-label">IG</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="ig" type="text" class="form-control" id="ig" value="{{ $data['ig'] }}">
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="fb" class="col-md-4 col-lg-3 col-form-label">Fb</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fb" type="text" class="form-control" id="fb" value="{{ $data['fb'] }}">
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="twitter" value="{{ $data['twitter'] }}">
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="tiktok" class="col-md-4 col-lg-3 col-form-label">Tiktok</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tiktok" type="text" class="form-control" id="tiktok" value="{{ $data['tiktok'] }}">
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="tiktok" class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="tiktok" value="{{ $data['linkedin'] }}">
                    </div>
                  </div> 

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary form-profile">Save</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3 d-none" id="profile-settings" role="tabpanel">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked="">
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked="">
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked="" disabled="">
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                <!-- Change Password Form -->
                <form action="{{ route('change.password') }}" class="submit">
                  @method('POST')
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="old_password" type="password" class="form-control" id="old_password">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="new_password" type="password" class="form-control" id="new_password">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="repeat_password" type="password" class="form-control" id="repeat_password">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary change-password">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <script>
    $(".form-profile").click(function(e){
        e.preventDefault();
        let $this = $(this); 
        $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        let data = {};
        let $form =  $this.closest('form');
        $form.ug("submit", function(result){
            let r = JSON.parse(result); 
            $this.html('Save').attr('disabled', false);
            // check validation
            $form.ug("validateForm",r.errors); 
            if(r.status){
                ug.alert(r.msg);
                $.each(r.data, function(i,v){
                  if($('.label-' + i).length){ 
                    $('.label-' + i).html(v);
                  }
                  if($('.img-' + i).length){ 
                    $('.img-' + i).attr('src', v);
                    $('.img-' + i +'1').attr('src', v);
                  }
                  if($('.profile-' + i).length){ 
                    $('.profile-' + i).html(v);
                  }
                  if($('.href-' + i).length){ 
                    $('.href-' + i).attr('href',v);
                  }
    
                });
            }
        })
    });

    $('.change-password').click(function(e){
      e.preventDefault();
      let $this = $(this); 
        // $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        let data = {};
        let $form =  $this.closest('form');
        $form.ug("submit", function(result){
            let r = JSON.parse(result); 
            $this.html('Change Password').attr('disabled', false);
            // check validation
            $form.ug("validateForm",r.errors); 
            if(r.status){
              ug.alert(r.msg);
              $form[0].reset();
            }
        })
    });
   
  </script>