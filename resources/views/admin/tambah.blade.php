@extends('admin.sidebar')

@section('isinya')
<form method="POST" action="/akun">
  @csrf
    <div class="mb-3">
      <label class="form-label @error('name') is-invalid @enderror" >Nama Lengkap</label>
      <input name="name" type="text" class="form-control" value="{{ old('name') }}">
      @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label @error('username') is-invalid @enderror">Username</label>
        <input name="username" type="text" class="form-control" value="{{ old('username') }}">
        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label @error('nik') is-invalid @enderror">NIK</label>
        <input name="nik" type="number" class="form-control" value="{{ old('nik') }}">
        @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label @error('email') is-invalid @enderror">Email</label>
        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <label class="form-label">Level Anda</label>
      <select name="level" class="form-select mb-3" aria-label="Default select example">
        {{-- <option selected >Silahkan Pilih Level Anda</option> --}}
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="masyarakat">Masyarakat</option>
      </select>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label @error('password') is-invalid @enderror">Password</label>
      <input type="password" class="form-control" name="password">
      @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection