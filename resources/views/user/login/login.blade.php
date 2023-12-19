 
<style>
  main{
    background: #E7E9F6;
  }
  .form-style{
    background: #F3F3F3;
    border: none;
    color: #8D8D8D !important;
  }
  .form-style::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #8D8D8D;
    opacity: 1; /* Firefox */
  }

  .form-style:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #8D8D8D;
  }

  .form-style::-ms-input-placeholder { /* Microsoft Edge */
    color: #8D8D8D;
  }
  .select-tyle {
    --bs-form-select-bg-img: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
      display: block;
      color: #8D8D8D !important;
      width: 100%;
      padding: 0.375rem 2.25rem 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: var(--bs-body-color);
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-color: var(--bs-body-bg);
      background-image: var(--bs-form-select-bg-img), var(--bs-form-select-bg-icon, none);
      background-repeat: no-repeat;
      background-position: right 0.75rem center;
      background-size: 16px 12px;
      border: var(--bs-border-width) solid var(--bs-border-color);
      border-radius: var(--bs-border-radius);
      background-color: #f3f3f3;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.button-style{
  background-color: #0DCF93;
  color: white;
  width: 60%;
}
.button-style:hover{
  background-color: #039466ca;
  color: white; 
}
body{
  background-color: white !important;
}
.card-style{
  border-radius: 43px;
  border: 1px solid #DDD;
  background:white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); 
}
</style>
 
<main>
  <div class="container"> 
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">  
            <div class="card mb-3 py-5 px-2 card-style"> 
              <div class="card-body"> 
                <div class="pt-4 pb-2"> 
                  <div class="d-flex justify-content-center ">
                    <a href="index.html" class="d-flex align-items-center w-auto">
                      <img src="{{ asset('/uploads/image/dakreative.png') }}" alt="" width="194" height="24"> 
                    </a>
                  </div><!-- End Logo -->
                </div> 
                <div class="row pb-4">
                    <div class="col-12  text-center"> 
                      <h5 class="card-title pb-0 fs-4">Sign to page</h5>
                      <small class="text-center small">Masukan token dan pilih page yang akan dibuka</p>
                    </div>
                </div>
                <form class="row g-3 needs-validation">
                  
                  <div class="col-12"> 
                    <select name="" id="" class="select-tyle">
                      <option value="1">Mempelai</option>
                      <option value="2">Pager Ayu</option>
                      <option value="3">Among</option>
                    </select>
                  </div>
                  <div class="col-12"> 
                    <div class="input-group has-validation">
                      <span class="input-group-text form-style" id="inputGroupPrepend"><i class="bx bxs-lock-alt" style="color:#8D8D8D"></i></span>
                      <input type="password" name="password" class="form-control form-style" id="password" required placeholder="Masukan token"> 
                    </div>
                  </div>
                  <div class="col-12"> 
                    <div class="input-group has-validation">
                      <span class="input-group-text form-style" id="inputGroupPrepend"><i class="bx bxs-lock-alt" style="color:#8D8D8D"></i></span>
                      <input type="password" name="password" class="form-control form-style" id="password" required placeholder="masukan password"> 
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button class="btn  button-style" type="submit">Login</button>
                  </div>
                </form>

              </div>
            </div> 
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<script>
  $(document).ready(function(){
    ug.alert('sss')
  })
</script>