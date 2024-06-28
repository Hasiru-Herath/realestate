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

        if ($request->filled('square_feet')) {
            $query->where('square_feet', '>=', $request->square_feet);
        }

        // if ($request->filled('area')) {
        //     $query->where('area', 'like', '%' . $request->area . '%');
        // }

        $properties = $query->get();

        return view('/dashboard', compact('properties'));
    }

}
