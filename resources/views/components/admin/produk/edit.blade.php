<div class="modal-header">
    <h5 class="modal-title">Edit Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="post" action="{{ route('admin.update_produk') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
    <div class="form-group">
                                <label for="">Alamat</label>
                                <select class="form-select" name="id_kategori" required>
                                    @foreach($kategori as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error("id_kategori")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Nama Barang Lelang</label>
                                <input type="text" class="form-control @error("nama_produk") is-invalid @enderror" required value="{{old("nama_produk")}}" name="nama_produk" id="nama_produk" placeholder="">
                                @error('nama_produk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Kategori</label>
                                <select class="form-control @error('jenis_jual') is-invalid @enderror" name="jenis_jual" id="jenis_jual" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="lelang">Lelang</option>
                                    <option value="Negojualbeli">Nego Jual Beli</option>
                                    <!-- tambahkan option untuk produk lainnya -->
                                </select>
                                @error("jenis_jual")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Harga jual</label>
                                <input type="number" class="form-control @error("harga_jual") is-invalid @enderror" required value="{{old("harga_jual")}}" name="harga_jual" id="harga_jual" placeholder="">
                                @error("harga_jual")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Jenis Kepemilikan</label>
                                <select class="form-control @error('jenis_kepemilikan') is-invalid @enderror" name="jenis_kepemilikan" id="jenis_kepemilikan" required>
                                    <option value="">Pilih Jenis Kepemilikan</option>
                                    <option value="SHGB">SHGB</option>
                                    <option value="SHM">SHM</option>
                                    <option value="SHP">SHP</option>
                                    <!-- tambahkan option untuk produk lainnya -->
                                </select>
                                @error("jenis_kepemilikan")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Luas Tanah</label>
                                <input type="text" class="form-control @error("luas_tanah") is-invalid @enderror" required value="{{old("luas_tanah")}}" name="luas_tanah" id="luas_tanah" placeholder="">
                                @error("luas_tanah")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Luas Bangunan</label>
                                <input type="text" class="form-control @error("luas_bangunan") is-invalid @enderror" required value="{{old("luas_bangunan")}}" name="luas_bangunan" id="luas_bangunan" placeholder="">
                                @error("luas_bangunan")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Akses Terdekat</label>
                                <input type="text" class="form-control @error("akses_trdkt") is-invalid @enderror" required value="{{old("akses_trdkt")}}" name="akses_trdkt" id="akses_trdkt" placeholder="">
                                @error("akses_trdkt")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Row Jalan Utama</label>
                                <input type="text" class="form-control @error("row_jalan") is-invalid @enderror" required value="{{old("row_jalan")}}" name="row_jalan" id="row_jalan" placeholder="">
                                @error("row_jalan")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">tanggal Lelang</label>
                                <input type="date" class="form-control @error("tanggal_lelang") is-invalid @enderror" required value="{{old("tanggal_lelang")}}" name="tanggal_lelang" id="tanggal_lelang" placeholder="">
                                @error("tanggal_lelang")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control @error("deskripsi") is-invalid @enderror" rows="5" required name="deskripsi" id="deskripsi" placeholder="">{{old("deskripsi")}}</textarea>
                                @error("deskripsi")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>  
        <div class="form-group mt-3">
            <label for="">Gambar <small class="text-danger ms-1">* Opsional</small></label>
            <input type="file" class="form-control @error("gambar") is-invalid @enderror" value="{{old("gambar")}}" 
                 name="gambar" id="gambar" placeholder="">
            @error("gambar")
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <a href="{{url_images('gambar', $edit->gambar)}}" target="_blank">
                <img src="{{url_images('gambar', $edit->gambar)}}" class="img-fluid mt-3" style="width:80px;">
            </a>
        </div>
        <input type="hidden" value="{{$edit->id}}" name="id">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>