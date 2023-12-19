<style>
body{ 
background:#E7E9F6;
}
.page-ayu{ 
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
.page-ayu .container{
margin-top: 100px;
}
.page-ayu .card{
border-radius: 14px !important;
}
.page-ayu .camera-room{
padding: 30px; 
min-height: 200px; 
}
.page-ayu .frame-qr{ 
position: relative;
}
.page-ayu .camera-room .scan
{
width:100%;
height:10px;
background-color:rgba(0,0,0,.8);
position:absolute;
z-index:9999;
animation:
scan 2s ease-in-out infinite alternate,
scan 2s ease-in-out infinite;
-webkit-animation-direction: alternate-reverse; 
box-shadow:0 0 50px 10px #18c89b;

} 
@-webkit-keyframes scan {
0%, 100% {
-webkit-transform: translateY(0);
transform: translateY(0);
}
100% {
-webkit-transform: translateY(230px);
transform: translateY(230px);
}
}

</style>
<main> 
<section class="page-ayu"> 
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
                <h5 class="card-title">Selamat datang dipage Pager ayu</h5>
                <!-- Bordered Tabs Justified -->
                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-upc-scan"></i> Scan Qr </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" > <i class="bi bi-search"></i> Cari Tamu</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" > <i class="bi bi-person-lines-fill"></i> Tambah Tamu Onsite</button>
                    </li>
                    
                </ul>  
                </div>
            </div>
            </div> 
            <div class="col-md-12">
            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab"> 
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <div class="card">
                        <div class="d-flex justify-content-end px-2 pt-2">
                            <button class="btn btn-success" onclick="activecamera(0)">
                            <i class="bi bi-camera-fill"></i>
                            </button>
                            &nbsp;
                            <button class="btn btn-primary">
                            <i class="bi bi-arrow-repeat"></i>
                            </button>
                        </div>
                        <div class="camera-room">
                            <div class="frame-qr ">
                            <div class="scan d-none"></div>
                            <div id="reader"></div>
                            </div>
                            <small id="camera-stat"> camera off click icon camera to actived </small>
                            <p>Scan Your Qr Code Here . . .</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                        <table class="table datatable mt-4">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori Undangan</th>
                                <th scope="col">Tanggal Kehadiran</th> 
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td> 
                            </tr> 
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div> 
            </div><!-- End Bordered Tabs Justified --> 
            </div>
        <div>
</div>
</section>  
</main><!-- End #main --> 
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> 
<script>
    const html5QrCode = new Html5Qrcode("reader");
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        console.log(decodedText)
        $('.frame-qr').css({ 
            "min-height":"250px",
            "background": "url('assets/img/frame-qr.png')",
            "background-repeat": "no-repeat",
            "background-size": "contain", 
            "background-position": "center"
        }) 
        html5QrCode.stop().then((ignore) => {
            setTimeout(function(){
            $('.frame-qr').css({
                "position":"relative"
            });
            activecamera(0)
            },100);
        }).catch((err) => { 
            console.log(err)
        });
    };
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };
    function activecamera(camera){
        Html5Qrcode.getCameras().then(devices => { 
        let cameraId;
        if (devices && devices.length) { 
            cameraId = devices[camera].id;  
        } 
        html5QrCode.start(
                { deviceId: { exact: cameraId} }, 
                config,
                qrCodeSuccessCallback,
                (errorMessage) => { 
                // parse error, ignore it.
                })
            .catch((err) => {
                console.log(err)
            });
        }).catch(err => {
        // handle err
        });
    }
</script>