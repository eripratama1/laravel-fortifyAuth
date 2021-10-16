@extends('layouts.backend',['title' => 'Update Role dan Permission'])

@section('content')
    <div class="row">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Role</h4>
                    <form class="forms-sample" method="POST" action="{{ route('role-permission.update', $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Role</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputName1" value="{{ $role->name }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="js-example-basic-multiple w-100" name="permission-role[]" multiple="multiple">
                                <option value="">Pilih Akses</option>
                                @foreach ($permission as $item)
                                    <option value="{{ $item->id }}"
                                        {{ in_array($item->id, $rolePermissions) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                        <button class="btn btn-light">Batal</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Update Permission</div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                        <button class="close">&times;</button>
                    @endif
                    <form action="{{ route('permission.store') }}" method="post" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Hak Akses</label>
                            <input type="text" class="form-control @error('permission') is-invalid @enderror"
                                placeholder="permission" name="permission">
                            @error('permission')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="" class="btn btn-light">Batal</a>
                        </div>
                        <hr>
                        <h6>List Hak Akses</h6>
                        @forelse ($permission as $item)
                            <li>{{ $item->name }}</li>
                        @empty
                            <li>Data hak akses belum ada</li>
                        @endforelse
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
