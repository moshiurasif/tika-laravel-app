<?php

namespace App\Http\Controllers;

use App\Models\VaccinationCenter;
use Illuminate\Http\Request;

class VaccinationCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaccinationCenters = VaccinationCenter::paginate();
        return view("vaccinationCenters.index", compact("vaccinationCenters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaccinationCenter $vaccinationCenter)
    {
        return view("vaccinationCenters.edit", ["vaccinationCenter" => $vaccinationCenter]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VaccinationCenter $vaccinationCenter)
    {
        $request->validate([
            "name" => "required",
            "upazilla_id" => "required",
            "vaccine_id" => "required",
        ]);
        $vaccinationCenter->name = $request->name;
        $vaccinationCenter->upazilla_id = $request->upazilla_id;
        $vaccinationCenter->vaccine_id = $request->vaccine_id;
        $vaccinationCenter->save();

        return redirect(route('vaccinationCenters.index'))->with([
            "message" => $vaccinationCenter->name . " is updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaccinationCenter $vaccinationCenter)
    {
        //
    }
}
