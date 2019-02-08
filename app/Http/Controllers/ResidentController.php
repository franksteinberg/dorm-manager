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
        $validatedProperties = $this->validate(
            $request,
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|in:M,F',
                'address1' => 'string|max:255',
                'address2' => 'string|max:255',
                'student_id' => 'string|max:255',
                'birth_date' => 'date',
                'phone' => 'string|max:255',
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
            'msg' => "Successfully Retrieved Resident: [{$resident->id}] {$resident->first_name} {$resident->last_name}",
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        //
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
                'first_name' => 'string|max:255',
                'last_name' => 'string|max:255',
                'address1' => 'string|max:255',
                'address2' => 'string|max:255',
                'student_id' => 'string|max:255',
                'birth_date' => 'date',
                'phone' => 'string|max:255',
            ]
        ))->each(function ($value, $key) use ($resident) {
            $resident->{$key} = $value;
        });

        return response()->json([
            'data' => ($resident->isDirty()) ? $resident->save() : $resident,
            'error' => false,
            'msg' => "Successfully Updated Resident: [{$resident->id}] {$resident->first_name} {$resident->last_name}",
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
            'msg' => "Successfully Deleted Resident: [{$resident->id}] {$resident->first_name} {$resident->last_name}",
        ]);
    }
}
