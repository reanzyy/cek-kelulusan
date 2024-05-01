@extends('layouts.admin.app')

@section('title')
    Siswa
@endsection


@section('head')
    <style>
        [v-cloak]>* {
            display: none;
        }

        [v-cloak]::before {
            content: "loading...";
        }
    </style>
@endsection

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div id="app" v-cloak>
        <div class="row">
            <div class="col-12">
                <div class="card box-shadow-0 border-info">
                    <div class="card-header card-head-inverse bg-secondary">
                        <h3 class="card-title text-center">DAFTAR SISWA</h3>


                    </div>
                    <div class="card-content collpase show">
                        <br>
                        <a href="/student/create" class="btn btn-social btn-min-width mr-1 mb-1 btn-primary pull-right"
                            class="float-sm-left">
                            <span class="fa fa-plus"></span> Tambah Siswa &nbsp; </a>

                        <a href="/student/upload" class="btn btn-social btn-min-width mr-1 mb-1 btn-secondary pull-right"
                            class="float-sm-left">
                            <span class="fa fa-file"></span> Upload Siswa &nbsp; </a>



                        <br>
                        <br>


                        <div class="card-body card-dashboard">


                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="bg-success text-white" style="font-size: 14px;">
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Status </th>
                                        <th>SKL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr style="font-size: 14px;" v-for="st in student">

                                        <td>@{{ st.name }}</td>
                                        <td>@{{ st.class }}</td>
                                        <td>@{{ st.nis }}</td>
                                        <td>
                                            <span v-if="st.status == 'LULUS'" class="badge bg-success">LULUS</span>
                                            <span v-else class="badge bg-danger">TIDAK LULUS</span>
                                        </td>
                                        <td>
                                            <a :href="st.path" target="_blank">Lihat Dokumen</a>
                                        </td>

                                        <td>
                                            <a class="btn btn-warning" :href="'/student/edit/' + st.id"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" href="" @click.prevent="deleteRecord(st.id)"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            data: {
                student: JSON.parse(String.raw `{!! json_encode($student) !!}`),
            },
            methods: {

                deleteRecord: function(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data akan dihapus!",
                        icon: 'warning',
                        reverseButtons: true,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Cancel',
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            return axios.delete('/student/' + id)
                                .then(function(response) {
                                    console.log(response.data);
                                })
                                .catch(function(error) {
                                    console.log(error.data);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops',
                                        text: 'Something wrong',
                                    })
                                });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data berhasil dihapus!',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    })
                },


            }
        })
    </script>
@endsection
