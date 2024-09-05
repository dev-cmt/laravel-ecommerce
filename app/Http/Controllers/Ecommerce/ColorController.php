<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Ecommerce\Color;

class ColorController extends Controller
{
    // Show the list of colors
    public function index()
    {
        $colors = Color::all();
        return view('ecommerce.backend.colors.index', compact('colors'));
    }

    // Show the form for creating a new color
    public function create()
    {
        return view('ecommerce.backend.colors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'color_name' => 'required|string|max:255|unique:colors,color_name',
            'hex_value' => 'nullable|string|max:7|unique:colors,hex_value', // This can be nullable as we handle it
        ]);

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;

        // Automatically assign hex value if color_name is a known color
        if (empty($validatedData['hex_value'])) {
            $validatedData['hex_value'] = $this->nameToHex($validatedData['color_name']) ?? $validatedData['hex_value'];
        }

        // Proceed with creating the color
        Color::create($validatedData);

        return redirect()->route('colors.index')->with('success', 'Color created successfully.');
    }


    // Show the form for editing the specified color
    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('ecommerce.backend.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);

        $validatedData = $request->validate([
            'color_name' => 'required|string|max:255|unique:colors,color_name,' . $color->id,
            'hex_value' => 'nullable|string|max:7|unique:colors,hex_value,' . $color->id,
        ]);
        
        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::user()->id;

        // Automatically assign hex value if color_name is a known color
        if (empty($validatedData['hex_value'])) {
            $validatedData['hex_value'] = $this->nameToHex($validatedData['color_name']) ?? $validatedData['hex_value'];
        }

        // Proceed with updating the color
        $color->update($validatedData);

        return redirect()->route('colors.index')->with('success', 'Color updated successfully.');
    }


    // Show the details of the specified color
    public function show($id)
    {
        $color = Color::findOrFail($id);
        return view('ecommerce.backend.colors.show', compact('color'));
    }

    // Delete the specified color from the database
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }

    public function nameToHex($color)
    {
        return [
            'red' => '#FF0000',
            'green' => '#008000',
            'blue' => '#0000FF',
            'black' => '#000000',
            'white' => '#FFFFFF',
            'yellow' => '#FFFF00',
            'purple' => '#800080',
            'gray' => '#808080',
            'orange' => '#FFA500',
        ][strtolower($color)] ?? null;
    }
}
