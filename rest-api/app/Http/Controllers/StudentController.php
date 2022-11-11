<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $row = $student->count();

        if ($row != null) {

            $data = [
                'message' => 'Get All Student',
                'data' => $student
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Data not found',
            ];

            return response()->json($data, 404);
        }

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
        $rules = array(
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        );

        $messages = array(
            'nama.required' => 'nama tidak boleh kosong',
            'nim.required' => 'nim tidak boleh kosong',
            'nim.numeric' => 'nim harus berupa angka',
            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'email harus berupa email yang valid',
            'jurusan.required' => 'jurusan tidak boleh kosong'

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            $messages = $validator->getMessageBag();
            return response()->json(["messages" => $messages], 500);
        }


        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        ]);

        $student = Student::create($validatedData);

        $data = [
            'success' => true,
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
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

            $rules = array(
                'nama' => 'required',
                'nim' => 'numeric|required',
                'email' => 'email|required',
                'jurusan' => 'required',
            );

            $messages = array(
                'nama.required' => 'nama tidak boleh kosong',
                'nim.required' => 'nim tidak boleh kosong',
                'nim.numeric' => 'nim harus berupa angka',
                'email.required' => 'email tidak boleh kosong',
                'email.email' => 'email harus berupa email yang valid',
                'jurusan.required' => 'jurusan tidak boleh kosong'

            );

            $validator = Validator::make($request->all(), $rules, $messages);

            if($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(["messages" => $messages], 500);
            }

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
