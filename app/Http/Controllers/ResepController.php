<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function indexresep()
    {
        return view('admin.resepinput.index');
    }

    public function index()
    {
        $reseps = Resep::all();
        return view('admin.resepinput.index', compact('reseps'));
    }

    public function tambahresep()
    {
        return view('admin.resepinput.tambahresep');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'photo' => 'nullable',
            'description' => 'required', // Sesuaikan dengan batas karakter yang diizinkan
            'ingredient' => 'required',
            'instruction' => 'required',
        ]);

        // Buat data resep baru
        $data = [
            'title' => $validatedData['title'],
            'photo' => $validatedData['photo'],
            'description' => $validatedData['description'],
            'ingredient' => $validatedData['ingredient'],
            'instruction' => $validatedData['instruction'],
        ];


        $path = "/storage/" . explode("public/", $request->file('photo')->store('public/resepphoto'))[1];

        // Simpan data resep
        Resep::create([
            'title' => $data['title'],
            'photo' => $path,
            'description' => $data['description'],
            'ingredient' => $data['ingredient'],
            'instruction' => $data['instruction'],
        ]);

        // Alihkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('indexresep')->with('success', 'Resep berhasil ditambahkan!');
    }


    public function showresep($id)
    {
        $recipe = Resep::find($id);

        if (!$recipe) {
            abort(404); // Jika resep tidak ditemukan, tampilkan halaman 404
        }

        return view('admin.resepinput.detailresep', compact('recipe'));
    }


    public function editresep($id)
    {
        $recipe = Resep::find($id);

        if (!$recipe) {
            return redirect()->route('indexresep')->with('error', 'Recipe not found.');
        }

        return view('admin.resepinput.editresep', compact('recipe'));
    }

    public function updateresep(Request $request, $id)
    {
        // Find the recipe by ID
        $recipe = Resep::find($id);

        // Check if the recipe exists
        if (!$recipe) {
            return redirect()->back()->with('error', 'Recipe not found.');
        }

        // Validate the updated form data
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Add any relevant validation rules
            'description' => 'required',
            'ingredient' => 'required',
            'instruction' => 'required',
        ]);

        // Update data based on validated input
        $recipe->title = $validatedData['title'];
        $recipe->description = $validatedData['description'];
        $recipe->ingredient = $validatedData['ingredient'];
        $recipe->instruction = $validatedData['instruction'];

        // Update photo if provided
        if ($request->hasFile('photo')) {
            $path = "/storage/" . explode("public/", $request->file('photo')->store('public/resepphoto'))[1];
            $recipe->photo = $path;
        }

        // Save the changes
        $recipe->save();

        return redirect()->route('indexresep')->with('success', 'Recipe updated successfully.');
    }

    public function deleteResep($id)
    {
        $recipe = Resep::find($id);

        if (!$recipe) {
            return redirect()->back()->with('error', 'Recipe not found.');
        }

        // Delete the associated photo file from storage/resepphoto directory
        if ($recipe->photo) {
            $photoPath = str_replace("/storage/resepphoto/", "", $recipe->photo);
            Storage::disk('public')->delete('resepphoto/' . $photoPath);
        }

        // Delete the recipe data from the database
        $recipe->delete();

        return redirect()->route('indexresep')->with('success', 'Recipe deleted successfully.');
    }
}
