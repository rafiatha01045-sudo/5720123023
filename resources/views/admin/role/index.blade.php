@extends('role')

@section('content')

    <div class="container">

        <h3 class="mb-3">Data Role</h3>

        <a href="{{ route('role.create') }}" class="btn btn-primary mb-3">
            Tambah Role
        </a>

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($roles as $r)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $r->name }}</td>

                        <td>
                            @foreach($r->permissions as $p)
                                <span class="badge bg-success">
                                    {{ $p->slug }}
                                </span>
                            @endforeach
                        </td>

                        <td>

                            <a href="{{ route('role.edit', $r->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('role.delete', $r->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection