
<style>
    body{ 
      background:#E7E9F6;
    }
    .page-user{ 
      background:#E7E9F6;
      background-repeat: no-repeat;
       /* Full height */
      height: 100%;  
      width: 100%;
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover; 
    } 
    .page-user .container{
      margin-top: 100px;
    }
    .page-user .card{
      border-radius: 14px !important;
    }
    .page-user .card-dashboard{
      border-radius: 14px;
      background: #7B62DA; 
      /* width: 193px; */
      min-height: 260px;
      flex-shrink: 0; 
      color: white;
    }
    .page-user .card-dashboard-two{
      border-radius: 14px;
      background: #7B62DA; 
      /* width: 193px; */
      min-height: 114px;
      flex-shrink: 0; 
      color: white;
    }
    .page-user .card-dashboard .label{
      font-family: Poppins;
      font-size: 64px;
      font-style: normal;
      font-weight: 900;
      line-height: normal; 
    }
    .page-user .label-tab{
      color: #0C0D36;
      text-align: center;
      font-family: Poppins;
      font-size: 36px;
      font-style: normal;
      font-weight: 900;
      line-height: normal; 
    }
  </style> 
<main> 
    <section class="page-user"> 
      <div class="container">
            <div class="row d-flex">
              <div class="col-8">
                <div class="pagetitle">
                  <img src="assets/img/dakreative.png" alt="" width="194" height="24">
                  <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                  </nav>
                </div>
              </div>
              <div class="col text-end pt-4 px-2">
                logout <i class="bi bi-box-arrow-right"></i>
              </div>
            </div>
            <div class="row d-flex flex-column align-items-center justify-content-center ">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Selamat datang dipage Mempelai</h5>
                      <!-- Bordered Tabs Justified -->
                      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-grid"></i> Home</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1"><i class="bx bx-paper-plane"></i> Kirim Whatsapp</button>
                        </li>
                         
                      </ul>  
                    </div>
                  </div>
                </div> 
                <div class="col-md-12">
                  <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                       <div class="container mt-4">
                        <div class="row mt-4">
                          <div class="col-md-4">
                            <div class="card card-dashboard">
                              <div class="card-body">
                                <div class="d-flex justify-content-between">
                                  <div class="text-center mt-3  ">Total undangan <br> shared platform</div>
                                  <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-white"></i></div>
                                </div>
                                <div class="text-center mt-4">
                                   <div class="label">
                                    170
                                   </div> 
                                    Undangan
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Digital Scan Platform</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="col-md-6">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">On the spot Offline</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Undangan Umum Hadir</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Undangan VIP Hadir</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Undangan VVIP Hadir</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                            </div>
                          </div>  
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card card-dashboard-two ">
                              <div class="card-body">
                                <div class="d-flex justify-content-between">
                                  <div class="text-center mt-3  ">Total Souvenir</div>
                                  <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-white"></i></div>
                                </div>
                                <div class="text-center">
                                   <div class="  label-tab text-white">
                                    170
                                   </div> 
                                    Undangan
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Total Souvenir disalurkan</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Sisa Sovenir</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <div class="text-center mt-3  ">Dourprize Sovenir</div>
                                      <div class="text-end mt-2"><i class="bx bx-dots-horizontal-rounded text-primary"></i></div>
                                    </div>
                                    <div class="text-center label-tab"> 
                                        170 
                                    </div>
                                  </div>
                                </div> 
                              </div>
                            </div>
                          </div>
                       </div>
                    </div> 
                  </div><!-- End Bordered Tabs Justified -->
                  <div class="tab-pane fade " id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">  
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card pt-4">
                                <div class="card-body">
                                  <div class="mx-auto col-md-8 ">
                                    <div class="row text-center"> 
                                        <div class="form-group col-4">
                                            <label for="tamu">Nama Tamu</label>
                                            <input type="text" class="form-control" placeholder="Contoh: Dia dan Partner" id="nama" name="nama" required="">
                                        </div> 
                                        <div class="form-group col-4">
                                            <label for="tamu">Kategori Undangan</label>
                                            <select name="kategori" id="kategori" class="form-select">
                                              <option value=""></option>
                                            </select>
                                        </div> 
                                        <div class="form-group col-4">
                                            <label for="tamu">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi"style="width:100%; height:17px"></textarea>
                                        </div>
                                        <div class="form-group col-12 mt-2">
                                            <button class="btn btn-primary" id="submit" style="font-size:15px !important;">Buat Link Undangan <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                        </div> 
                                    </div> 
                                </div> 
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="card p-4">
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table ug-table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kategori Undangan</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td> <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Kirim ulang whatsapp"><i class="bx bxl-whatsapp"></i></button> </td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div> 
                    </div>
                  </div> 
                </div>
            <div>
      </div>
    </section>  
  </main><!-- End #main --> 

  <script>
    $('.ug-table').DataTable();
  </script>