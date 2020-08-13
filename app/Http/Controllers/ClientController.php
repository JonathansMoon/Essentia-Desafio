<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use App\Models\Client;
use File;

class ClientController extends Controller
{
    private $client;
    private $clientService;

    public function __construct(Client $client, ClientService $clientService) {
        $this->client = $client;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->client->all();

        return view('essentia.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('essentia.create');
    }

    public function store(ClientRequest $request)
    {
        try {
            $this->clientService->createClient($request);
            toastr()->success('Essentia success create');
            return redirect()->route('client.index');
        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withInput();
        }
    }

    public function show($id)
    {
        $client = $this->client->find($id);
        return view('essentia.show', compact('client'));
    }

    public function edit($id)
    {
        $client = $this->client->find($id);
        return view('essentia.create', compact('client'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->clientService->updateClient($request, $id);
            toastr()->success('Essentia success update');
            return redirect()->route('client.index');
        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $client = $this->client->find($id);
        File::delete('storage/essentia/'.$client->photo);
        File::delete('storage/essentia/thumbnail/'.$client->photo);
        $client->delete();

        toastr()->success('Client success delete');
        return redirect()->back();
    }
}
