@extends('template.index')
@section('title','Home Pengguna')
@section('style')
   <style>
     .card {
        transition: transform 0.2s;
        }
        .card:hover {
        transform: scale(1.05);
        }
   </style>
@endsection
    @section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('img/servis.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/service.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/mtr3.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/mtr4.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/mtr5.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <img src="{{asset('img/baru.jpg')}}" class="card-img-top" alt="..." style="height: 300px">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <img src="{{asset('img/baru.jpg')}}" class="card-img-top" alt="..." style="height: 300px">
                </div>
            </div>
        </div>
        <h3 class="text-dark mb-4 text-center card-title">Selamat Datang di Zackk</h3>
        <p class="card-text">Zackk adalah toko ritel modern yang mengkhususkan diri dalam menyediakan 
            suku cadang berkualitas tinggi untuk sepeda motor. Dengan fokus utama pada penyediaan ban motor 
            berkualitas dan tahan lama, kami juga menawarkan layanan unggulan seperti Servis Motor, Ganti Oli 
            dan Suku Cadang Otomotif.Komitmen Kami pada Indonesia: Dengan lebih dari 1100 toko Planet Ban 
            tersebar di seluruh Indonesia,kami hadir lebih dekat dengan masyarakat Indonesia. Dukungan dari 7 
            Juta pelanggan di seluruh negeri membuktikan kepercayaan yang diberikan kepada kami untuk memenuhi 
            kebutuhan suku cadang sepeda motor. Ini memotivasi kami untuk terus berinovasi dan menyediakan 
            produk-produk terbaik serta berkualitas bagi pemilik sepeda motor di Indonesia.</p>
        <div class="container mt-5">
            <div class="row">
                @foreach ($data as $item)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ $item->gambar }}" alt="" class="card-img-top" style="height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <a href="{{ route('detailArtikel', $item->id) }}" class="btn btn-dark d-block">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <span class="fst-italic">Ini Ulasan dalam italic</span>
                        <div class="rating mt-2">
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <p>Mekaniknya sangat ramah</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <span class="fst-italic">Ini Ulasan dalam italic</span>
                        <div class="rating mt-2">
                            <span class="star" style="color: yellow">&#9733;</span>
                            <span class="star" style="color: yellow">&#9733;</span>
                            <span class="star" style="color: yellow">&#9733;</span>
                            <span class="star" style="color: yellow">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <p>Bagus sekaliii</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <span class="fst-italic">Ini Ulasan dalam italic</span>
                        <div class="rating mt-2">
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <span class="star"  style="color: yellow">&#9733;</span>
                            <p>Mekaniknya ramah sekalii & lucuuu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="bg-success">
            <div class="mt-5 d-flex justify-content-center">
                <span>mau servis motor ? ayoo booking sekarang</span>
            </div>
            <div class="m-5 d-flex justify-content-center">
                <a href="{{ route('login',['id']) }}" class="btn btn-dark btn-rounded">Booking Sekarang !</a>
              </div>
        </div> --}}
        <div class="modal fade" id="tambahMekanikModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Booking</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('postPesan') }}" method="POST" class="form-group"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="merek_motor" class="text-dark">Merek Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text" required name="merek_motor" class="form-control" placeholder="Masukan Merek Motor">
                                <label for="seri_motor" class="text-dark">Seri Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text" required name="seri_motor" class="form-control" placeholder="Masukan Seri Motor Contoh : Vario">
                                <label for="mesin_motor" class="text-dark">Mesin Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text" required name="mesin_motor" class="form-control" placeholder="Masukan CC Mesin Motor">
                                <label for="no_plat" class="text-dark">Plat Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text" required name="no_plat" class="form-control" placeholder="Mauskan No Plat Motor Anda">
                                <label for="jenis_service" class="text-dark">Jenis Service</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text" required name="jenis_service" class="form-control" placeholder="Masukan Service yang Anda inginkan">
                                <label for="tgl_service" class="text-dark">Tanggal Booking</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="date" required name="tgl_service" class="form-control" placeholder="Masukan Tanggal yg ingin Anda Booking">
                                <label for="deskripsi" class="text-dark">Deskripsi</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text" required name="deskripsi" class="form-control" placeholder="Tambahkan Deskripsi "> --}}
                                {{-- <input type="hidden" name="status_service" class="form-control">
                                <input type="hidden" name="status_pembayaran" class="form-control">
                                <input type="hidden" name="status_orderan" class="form-control"> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
    </div>
                
    

          
    </div>
    @endsection

  
    

   