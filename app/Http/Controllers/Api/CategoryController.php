<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Registration;
use App\Models\Upazilla;
use App\Models\User;
use App\Models\VaccinationCenter;
use Illuminate\Http\Request;

use Twilio\Rest\Client;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function divisions()
    {
        $divisions = Division::where('enabled', 1)->get();

        return response()->json($divisions);
    }
    public function districts(Request $request)
    {

        $districts = District::where('enabled', 1)->where('division_id', $request->division_id)->get();
        return response()->json($districts);
    }
    public function upazillas(Request $request)
    {
        $upazillas = Upazilla::where('enabled', 1)->where('district_id', $request->district_id)->get();
        return response()->json($upazillas);
    }
    public function vaccinationCenters(Request $request)
    {
        $centers = VaccinationCenter::where('enabled', 1)->where('upazilla_id', $request->upazilla_id)->get();
        return response()->json($centers);
    }


    public function register(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'id_no' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'center_id' => 'required|integer',
            'diabetes' => 'required|boolean',
        ]);

        // Create a new registration record using Eloquent ORM
        $registration = Registration::create($validatedData);

        // You can return a response here if needed
        return response()->json(['message' => 'Registration successful', 'data' => $registration], 201);
    }
}
