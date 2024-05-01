<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $student = Student::all();
        return view('admin.student.index', [
            'student' => $student,
        ]);
    }

    // public function truncate()
    // {
    //     // $deleted = DB::table('students')->truncate();
    //     // return $deleted;

    //     // DB::table('students')->truncate();
    //     Student::query()->truncate();
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function upload()
    {
        return view('admin.student.upload');
    }

    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis|min:5|max:10',
            'name' => 'required|min:5|max:255',
            'class' => 'required|min:5|max:255',
            'status' => 'required|in:LULUS,TIDAK LULUS',
            'path' => 'required|url',
        ], [
            'nis.required' => 'NIS harus diisi!!',
            'nis.unique' => 'NIS sudah digunakan!',
            'nis.min' => 'Minimal 5 Karakter!',
            'nis.max' => 'Maksimal 10 karakter!',
            'name.required' => 'Nama harus diisi!',
            'name.min' => 'Minimal 5 Karakter!',
            'name.max' => 'Maksimal 255 karakter!',
            'class.required' => 'Kelas harus diisi!',
            'class.min' => 'Minimal 5 karakter!',
            'class.max' => 'Maksimal 255 karakter!',
            'status.required' => 'Status harus diisi!',
            'status.in' => 'Status hanya diisi LULUS / TIDAK LULUS!',
            'path.required' => 'Link SKL harus diisi',
            'path.url' => 'Link SKL tidak valid'
        ]);

        $student = new Student();
        $student->nis = $request->nis;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->status = $request->status;
        $student->path = $request->path;
        $student->save();

        return redirect('/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function import_excel(Request $request)
    {
        try {
            // validasi
            $this->validate($request, [
                'file' => 'required|mimes:csv,xls,xlsx'
            ]);

            // menangkap file excel
            $file = $request->file('file');

            // membuat nama file unik
            $nama_file = rand() . $file->getClientOriginalName();

            // upload ke folder file_siswa di dalam folder public
            $file->move('files/excel', $nama_file);

            // import data
            Excel::import(new StudentImport, 'files/excel/' . $nama_file);

            // alihkan halaman kembali
            return redirect('/student')->with('success', 'Data berhasil diimpor.');
        } catch (\Throwable $th) {
            // tangani pengecualian
            return redirect('/student')->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $request->validate([
            'nis' => 'required|min:5|max:10',
            'name' => 'required|min:5|max:255',
            'class' => 'required|min:5|max:255',
            'status' => 'required|in:LULUS,TIDAK LULUS',
            'path' => 'required|url',
        ], [
            'nis.required' => 'NIS harus diisi!',
            'nis.min' => 'Minimal 5 Karakter!',
            'nis.max' => 'Maksimal 10 karakter!',
            'name.required' => 'Nama harus diisi!',
            'name.min' => 'Minimal 5 Karakter!',
            'name.max' => 'Maksimal 255 karakter!',
            'class.required' => 'Kelas harus diisi!',
            'class.min' => 'Minimal 5 karakter!',
            'class.max' => 'Maksimal 255 karakter!',
            'status.required' => 'Status harus diisi!',
            'status.in' => 'Status hanya diisi LULUS / TIDAK LULUS!',
            'path.required' => 'Link SKL harus diisi',
            'path.url' => 'Link SKL tidak valid'
        ]);

        $student->nis = $request->nis;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->status = $request->status;
        $student->path = $request->path;
        $student->save();

        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        try {
            $student->delete();
            return [
                'message' => 'Data berhasil dihapus!',
                'error' => false,
                'code' => 200,
            ];
        } catch (Exception $e) {
            return [
                'message' => 'internal error',
                'error' => true,
                'code' => 500,
                'errors' => $e,
            ];
        }
    }
}