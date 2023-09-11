<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\People;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {

        if (empty($request->category_id)) {
            return "Please select category";
        }
        if (empty($request->id_no)) {
            return "ID number is not found";
        }
        if (empty($request->dob)) {
            return "Date of birth is not found";
        }

        $people = People::where('id_no', $request->id_no)->where('dob', $request->dob)->first();

        if (empty($people)) {
            return "ID not found";
        } else {
            $category = Category::where("id", $request->category_id)->first();
            if (empty($category)) {
                return "Category not found";
            } else {
                $current_age = tikaAgeDifference($people->dob);
                if ($current_age >= $request->min_age) {
                    if ($people->registered) {
                        return "Your are already registered";
                    } else {
                        return $people;
                    }
                } else {
                    return "Minimum age for" . $category->name . " is " . $category->min_age . ". Your current age is " . $current_age;
                }
            }
        }
    }
}
