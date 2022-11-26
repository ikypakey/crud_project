@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Project Simple CRUD Data Siswa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('sisw.create') }}"> Input Siswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">NIS</th>
            <th width="280px"class="text-center">Nama Siswa</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($sisw as $siswa)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $siswa->NIS }}</td>
            <td>{{ $siswa->NamaSiswa }}</td>
            <td>{{ $siswa->Alamat }}</td>
            <td class="text-center">
                <form action="{{ route('sisw.destroy',$siswa->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('sisw.edit',$siswa->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $sisw->links() !!}

@endsection