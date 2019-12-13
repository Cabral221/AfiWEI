<?php

namespace App\Http\Controllers;

use App\Model\Room;
use App\Model\Niveau;
use App\Model\Sector;
use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sectors = Sector::all();
        $niveaux = Niveau::all();
        $rooms = Room::getDisponible();
        $students = Student::all();
        return view('student.index', compact('niveaux','rooms','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'lastname' => 'required|min:2',
            'firstname' => 'required|min:2',
            'niveau' => 'required',
            'room' => 'required',
        ]);
        // dd($request->lastname);
        Student::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'niveau_id' => $request->niveau,
            'room_id' => $request->room,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $student = Student::find($student);
        // $sectors = Sector::all();
        $rooms = Room::all();
        $niveaux = Niveau::all();
        return view('student.edit',compact('student','rooms','niveaux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'lastname' => 'required|min:2',
            'firstname' => 'required|min:2',
            'niveau' => 'required',
            'room' => 'required',
        ]);
        // dd($id);
        Student::find($id)->update([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'niveau_id' => $request->niveau,
            'room_id' => $request->room,
        ]);
        // dd($id->lastname);
        return redirect()->route('etudiant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back();
    }
}
