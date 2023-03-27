@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        {{ alertbs_form($errors) }}
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#modelIdPlus">
            <i class="fas fa-plus mr-1"></i> Produk
        </button>
        <div class="card card-rounded mt-2">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title pt-2"> <i class="fas fa-database me-1"></i> Data Produk</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 ms-auto">
                        <form method="get" action="">
                            <div class="input-group mb-3">
                                <input type="text" value="{{$request->get('search')}}" name="search" id="search" class="form-control" placeholder="Cari Produk" aria-describedby="helpId">
                                @if($request->get('search'))
                                    <a href="{{ route('admin.produk') }}" 
                                        class="input-group-text btn btn-success btn-md">
                                        <i class="fas fa-sync pr-2"></i>Refresh</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive mt-1">
                    <table class="table table-striped table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Sub Wilayah</th>
                                <th>Alamat</th>
                                <th>Kategori</th>
                                <th>Harga jual</th>
                                <th>Jenis Kepemilikan</th>
                                <th>Luas Tanah</th>
                                <th>Luas Bangunan</th>
                                <th>Akses Terdekat</th>
                                <th>Row Jalan Utama</th>
                                <th>Tanggal Lelang</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no =1;@endphp
                            @forelse($produk as $r)
                            <tr>
                                <td>{{$no}}</td>
                                <td><img src="{{url_images('gambar', $r->gambar)}}" class="img-fluid" style="width:80px;"></td>      
                                <td>{{$r->nama_kategori}}</td>      
                                <td>{{$r->nama_produk}}</td>    
                                <td>{{$r->jenis_jual}}</td> 
                                <td>Rp{{number_format($r->harga_jual)}},-</td>  
                                <td>{{$r->jenis_kepemilikan}}</td>  
                                <td>{{$r->luas_tanah}}</td>  
                                <td>{{$r->luas_bangunan}}</td>  
                                <td>{{$r->akses_trdkt}}</td>  
                                <td>{{$r->row_jalan}}</td>  
                                <td>{{$r->tanggal_lelang}}</td>  
                                <td>{{$r->created_at}}</td> 
                                <td>
                                    <a href="javascript:void(0)" data-id="{{ $r->id }}" 
                                        class="btn btn-success btn-sm ubah" title="Edit">
                                        <i class="fa fa-edit"></i>  
                                    </a>   
                                    <a href="{{url("admin/produk/delete/$r->id")}}" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Delete">
                                        <i class="fa fa-times"></i> 
                                    </a>
                                </td>
                            </tr>
                            @php $no++;@endphp
                            @empty
                            <tr>
                                <td colspan="7"> Tidak Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <br>
                {{ $produk->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelIdPlus" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('admin.create_produk') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Sub Wilayah</label>
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
                                <label for="">Alamat</label>
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
                                    <option value="Nego jual beli">Nego Jual Beli</option>
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
                                <input type="date" class="form-control @error("tanggal_lelang") is-invalid @enderror" value="{{old("tanggal_lelang")}}" name="tanggal_lelang" id="tanggal_lelang" placeholder="">
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
                                <label for="">Gambar</label>
                                <input type="file" class="form-control @error("gambar") is-invalid @enderror" required value="{{old("gambar")}}" name="gambar" id="gambar" placeholder="">
                                @error("gambar")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modelIdEdit" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">        
            <div class="modal-content" id="edit-content">
                
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script>
    // Call the dataTables jQuery plugin
    $('#example1 tbody').on('click', '.ubah', function(){
        var id = $(this).attr('data-id');
        $('#modelIdEdit').modal('show');
        $.ajax({
            url: '{{route("admin.edit_produk")}}',
            type: "POST",
            data: { "_token": "{{ csrf_token() }}","id" : id},
            timeout:60000,
            dataType : 'html',
            success:function(html){
                $("#edit-content").html(html);
            }
        });
    });
</script>
@endsection