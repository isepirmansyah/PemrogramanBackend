<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
        $data = [
            'message' => 'Get All Student',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'success' => true,
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get Detail Student',
                'data' => $student
            ];

            return response()->json($data, 200);

        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 404);
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
        //
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

        if ($student) {

            $student->update([
                'nama' => $request->get('nama'),
                'nim' => $request->get('nim'),
                'email' => $request->get('email'),
                'jurusan' => $request->get('jurusan')
            ]);

            $data = [
                'success' => true,
                'message' => 'Post updated successfully',
                'data' => $student,
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Student Not Found',
            ];

            return response()->json($data, 404);
        }



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

        if ($student) {

            $student->delete();

            $data = [
                'success' => true,
                'message' => 'Post deleted successfully',
                'data' => $student,
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Student Not Found',
            ];

            return response()->json($data, 404);
        }

    }
}
