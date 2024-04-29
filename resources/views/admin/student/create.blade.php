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
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="class">Kelas</label>
                            <input type="text" class="form-control" id="class" name="class" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="LULUS">LULUS</option>
                                <option value="TIDAK LULUS">TIDAK LULUS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="path">SKL</label>
                            <input type="text" class="form-control" id="path" name="path" required>
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
