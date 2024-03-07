<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\StoreRequest;
use App\Http\Requests\Admin\Client\UpdateRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.clients.index');
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(StoreRequest $request)
    {
        Client::create([
            'image' => $request->file('image')->storeAs(
                'uploads/clients',
                time() . '_' . $request->file('image')->getClientOriginalName(),
                'public'
            ),
            'name' => $request->input('name')
        ]);

        return to_route('clients.index')->with('success_message', 'Registro guardado exitosamente.');
    }

    public function edit(string $id)
    {
        $client = Client::find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $client = Client::find($id);
        $client->update([
            'name' => $request->input('name')
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($client->image);

            $client->update([
                'image' => $request->file('image')->storeAs(
                    'uploads/clients',
                    time() . '_' . $request->file('image')->getClientOriginalName(),
                    'public'
                )
            ]);
        }

        return to_route('clients.index')->with('success_message', 'Registro actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $client = Client::find($id);
        Storage::disk('public')->delete($client->image);
        $client->delete();

        return to_route('clients.index')->with('success_message', 'Registro eliminado exitosamente.');
    }
}
