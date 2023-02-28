@extends('admin.sidebar')

@section('isinya')
<div class="d-block flex-column p-3 " style="width: 100%" >
  <h1 class="d-block mb-5">Halaman Edit Akun</h1>
<form method="POST" action="/akun/{{ $user->id }}">
  @method('put')
  @csrf
     <div class="mb-3">
      <label class="form-label @error('name') is-invalid @enderror" >Nama Lengkap</label>
      <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}">
      @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label @error('username') is-invalid @enderror">Username</label>
        <input name="username" type="text" class="form-control" value="{{ old('username', $user->username) }}">
        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label @error('nik') is-invalid @enderror">NIK</label>
        <input name="nik" type="number" class="form-control" value="{{ old('nik', $user->nik) }}">
        @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label @error('email') is-invalid @enderror">Email</label>
        <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <label class="form-label">Level Anda</label>
      <select name="level" class="form-select mb-3" aria-label="Default select example">

        {{-- <option selected >Silahkan Pilih Level Anda</option> --}}
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="masyarakat">Masyarakat</option>
      </select>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection