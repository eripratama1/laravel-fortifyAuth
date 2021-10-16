@extends('layouts.backend',['title' =>'Roles Permissions'])

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Role Permission</h4>
                    <a href="{{ route('role-permission.create') }}" class="btn btn-primary btn-sm float-right">Tambah
                        Role</a>
                    <table class="table">
                        <tr>
                            <thead>
                                <th>No</th>
                                <th>Nama Role</th>
                                <th>Opsi</th>
                            </thead>
                            @forelse ($roles as $item)
                                <tbody>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin hapus data..?');"
                                            action="{{ route('role-permission.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('role-permission.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                @empty
                                    <td>Data Kosong</td>
                                </tbody>
                                <form method="POST" id="delete-form" class="d-none"
                                    action="{{ route('role-permission.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endforelse
                        </tr>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
