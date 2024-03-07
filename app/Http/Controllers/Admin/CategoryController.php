<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        Category::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ]);

        return to_route('categories.index')->with('success_message', 'Registro guardado exitosamente.');
    }

    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ]);

        return to_route('categories.index')->with('success_message', 'Registro actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return to_route('categories.index')->with('success_message', 'Registro eliminado exitosamente.');
    }
}
