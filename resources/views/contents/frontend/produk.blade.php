@extends('layouts.frontend')
@section('content')

<head>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>


</head>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-9 mx-auto">
            <!--product -->
            <div class="product">
                <h4 class="mb-4"><b>{{ $title }}</b></h4>
                <div class="row">
                <div class="col-sm-4">
                    <img src="{{ url_images('gambar', $edit->gambar) }}" class="img-fluid mb-3" width="400" height="200">
                </div>
                    <div class="col-sm-8 detail-produk">
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Sub Wilayah</b></div>
                            <div class="col-sm-8">
                                <a class="text-produk" href="{{ url('kategori/'.$edit->id) }}">
                                    {{ $edit->nama_kategori }}
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Alamat</b></div>
                            <div class="col-sm-8"><?= $edit->nama_produk;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Kategori</b></div>
                            <div class="col-sm-8"><?= $edit->jenis_jual;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Tanggal Lelang</b></div>
                            <div class="col-sm-8"><?= $edit->tanggal_lelang;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Harga</b></div>
                            <div class="col-sm-8 text-success"><h4><b>Rp<?= number_format($edit->harga_jual);?>,-</b></h4></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Jenis Kepemilikan</b></div>
                            <div class="col-sm-8"><?= $edit->jenis_kepemilikan;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Luas Tanah</b></div>
                            <div class="col-sm-8"><?= $edit->luas_tanah;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Luas Bangunan</b></div>
                            <div class="col-sm-8"><?= $edit->luas_bangunan;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Akses Terdekat</b></div>
                            <div class="col-sm-8"><?= $edit->akses_trdkt;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Row Jalan</b></div>
                            <div class="col-sm-8"><?= $edit->row_jalan;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"><b>Deskripsi</b></div>
                            <div class="col-sm-8"><?= $edit->deskripsi;?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4"> Scan Barcode ini untuk informasi lebih lanjut<b></b></div>
                            <div class="col-sm-4">
                        <img src="{{asset('assets/img/qrcodebsi.png')}}" class="img-fluid w-100 mb-3">
                        <div class="col-sm-8"> Atau hubungi WA 085263919210 / 082171817968<b></b></div>
                    </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection