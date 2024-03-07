<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Requests\Admin\Article\UpdateRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles.index');
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        Article::create([
            'image' => $request->file('image')->storeAs(
                'uploads/articles',
                time() . '_' . $request->file('image')->getClientOriginalName(),
                'public'
            ),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id')
        ]);

        return to_route('articles.index')->with('success_message', 'Registro guardado exitosamente.');
    }

    public function editorUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->storeAs(
                'uploads/articles',
                time() . '_' . $request->file('upload')->getClientOriginalName(),
                'public'
            );
            $url = asset("storage/{$fileName}");

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function edit(string $id)
    {
        $article = Article::find($id);
        $categories = Category::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $article = Article::find($id);
        $article->update([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id')
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);

            $article->update([
                'image' => $request->file('image')->storeAs(
                    'uploads/articles',
                    time() . '_' . $request->file('image')->getClientOriginalName(),
                    'public'
                )
            ]);
        }

        return to_route('articles.index')->with('success_message', 'Registro actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $article = Article::find($id);
        Storage::disk('public')->delete($article->image);
        $article->delete();

        return to_route('articles.index')->with('success_message', 'Registro eliminado exitosamente.');
    }
}
