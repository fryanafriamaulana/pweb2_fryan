@extends('layouts.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('bayar') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('bayar') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nim') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan') }}" id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="telp" class="col-sm-2 col-form-label">Telp</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='telp' value="{{ Session::get('telp') }}" id="telp">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tagihan" class="col-sm-2 col-form-label">Tagihan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='tagihan' value="{{ Session::get('tagihan') }}" id="tagihan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection
