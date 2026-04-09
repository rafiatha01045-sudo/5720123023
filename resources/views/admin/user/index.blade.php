@extends('user')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Data User</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- BUTTON --}}
            <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
                + Create User
            </a>

            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="180">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name ?? '-' }}</td>

                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('user.delete', $user->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Yakin hapus user ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data user belum ada
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection