<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('/dashboard', compact('properties'));
    }

    public function filter(Request $request)
    {
        $query = Property::query();

        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->filled('min_sq_ft') && $request->filled('max_sq_ft')) {
            $minSqFt = (int) $request->input('min_sq_ft');
            $maxSqFt = (int) $request->input('max_sq_ft');
            
            // Ensure maxSqFt is greater than minSqFt before applying the filter
            if ($maxSqFt >= $minSqFt) {
                $query->whereBetween('square_feet', [$minSqFt, $maxSqFt]);
            }
            
        }

        // if ($request->filled('area')) {
        //     $query->where('area', 'like', '%' . $request->area . '%');
        // }

        $properties = $query->get();

        return view('/dashboard', compact('properties'));
    }

}
