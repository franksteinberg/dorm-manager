<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'data' => Resident::get(),
            'error' => false,
            ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedProperties = $this->validate(
            $request,
            [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'gender' => 'required|in:M,F',
                'address1' => 'max:100',
                'address2' => 'max:100',
                'city' => 'max:50',
                'state' => 'max:2',
                'zip' => 'max:18',
                'student_id' => 'max:255',
                'birth_date' => 'date',
                'phone' => 'max:25',
            ]
        );

        return response()->json([
            'data' => Resident::create($validatedProperties),
            'error' => false,
            'msg' => 'New Resident Created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        return response()->json([
            'data' => $resident,
            'error' => false,
            'msg' => "Request Successful",
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident_with_housing)
    {
        return view('residents.edit', [
            'resident' => $resident_with_housing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     * @throws \Exception When Resident Not Found. Handled By Laravel ExceptionHandler.
     */
    public function update(Request $request, Resident $resident)
    {
        collect($this->validate(
            $request,
            [
                'first_name' => 'max:50',
                'last_name' => 'max:50',
                'address1' => 'max:100',
                'address2' => 'max:100',
                'city' => 'max:50',
                'state' => 'max:2',
                'zip' => 'max:18',
                'student_id' => 'max:255',
                'birth_date' => 'date',
                'phone' => 'max:25',
            ]
        ))->each(function ($value, $key) use ($resident) {
            $resident->{$key} = $value;
        });

        return response()->json([
            'data' => ($resident->isDirty()) ? $resident->save() : $resident,
            'error' => false,
            'msg' => "Update Successful.",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     * @throws \Exception When Resident Not Found. Handled By Laravel ExceptionHandler.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();
        return response()->json([
            'data' => null,
            'error' => false,
            'msg' => "Successfully Deleted Resident.",
        ]);
    }
}
