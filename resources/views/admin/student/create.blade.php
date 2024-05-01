@extends('layouts.admin.app')

@section('title', 'Tambah Student')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-head-inverse bg-secondary">
                    <h3 class="card-title text-center">Tambah Siswa</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis"
                                value="{{ old('nis') }}">
                            @error('nis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class">Kelas</label>
                            <input type="text" class="form-control" id="class" name="class"
                                value="{{ old('class') }}">
                            @error('class')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Pilih status</option>
                                <option value="LULUS" {{ old('status') == 'LULUS' ? 'selected' : '' }}>LULUS</option>
                                <option value="TIDAK LULUS" {{ old('status') == 'TIDAK LULUS' ? 'selected' : '' }}>TIDAK LULUS</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="path">Link SKL</label>
                            <input type="text" class="form-control" id="path" name="path"
                                value="{{ old('path') }}">
                            @error('path')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-end">
                            <a class="btn btn-secondary" href="/student">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
