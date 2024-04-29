@extends('layouts.admin.app')

@section('title', 'Edit Student')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-head-inverse bg-secondary">
                    <h3 class="card-title text-center">Edit Siswa</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.update', $student->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn"
                                value="{{ $student->nisn }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $student->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="class">Kelas</label>
                            <input type="text" class="form-control" id="class" name="class"
                                value="{{ $student->class }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="LULUS" {{ $student->status == 'LULUS' ? 'selected' : '' }}>LULUS</option>
                                <option value="TIDAK LULUS" {{ $student->status == 'TIDAK LULUS' ? 'selected' : '' }}>TIDAK
                                    LULUS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="path">SKL</label>
                            <input type="text" class="form-control" id="path" name="path"
                                value="{{ $student->path }}" required>
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
