@extends('admin.sidebar')

@section('isinya')

<div class="d-block flex-column p-3 " style="width: 100%" >
            <h1 class="d-block">Data Semua Akun</h1>


        @if(session()->has('succes'))

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

        @if(session()->has('edit'))

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('edit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

            <div class="d-flex justify-content-end px-5">
              <a type="button" href="/akun/create" class="btn btn-primary m-3">Tambah Akun</a>
              <a type="button" href="/pdf" class="btn btn-outline-primary m-3">Export Data</a>
            </div>

           
     
            <table class="table-hover table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

            @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->nik }}</td>
                <td> {{ $item->level }}</td>
                <td>
                    <a href="/akun/{{ $item->id }}/edit" class="badge bg-warning">Edit</a>
                    <form action="/akun/{{ $item->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button href="" class="badge bg-danger border-0" onclick="return confirm('apakah anda ingin menghapus ?')">Hapus</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
                </tbody>
              </table>
</div>
   
    
@endsection