<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store(Request $request) {
        Client::create($request->all());
        return redirect('/clients');
    }

    public function show(Client $client) {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client) {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client) {
        $client->update($request->all());
        return redirect('/clients');
    }

    public function destroy(Client $client) {
        $client->delete();
        return redirect('/clients');
    }
}