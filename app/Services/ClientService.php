<?php

namespace App\Services;

use Image;
use File;
use App\Models\Client;
use App\Exceptions\UploadException;

class ClientService
{
    private $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function createClient($request)
    {
        if ($request->has('photo') && $request->file('photo')->isValid()) {
            $data = $this->savePhoto($request);
        }

        $this->client->create($data);
    }

    public function updateClient($request, $id)
    {
        $data = $request->all();

        $client = $this->client->find($id);
        File::delete('storage/essentia/'.$client->photo);
        File::delete('storage/essentia/thumbnail/'.$client->photo);

        if ($request->has('photo') && $request->file('photo')->isValid()) {
            $data = $this->savePhoto($request);
        }

        $client->update($data);
    }

    public function savePhoto($request)
    {
        $data = $request->all();

        $nameFile = uniqid(date('HisYmd')) . $request->photo->extension();

        $data['photo'] = $nameFile;

        $upload = $request->photo->storeAs('essentia', $nameFile);

        $request->photo->storeAs('essentia/thumbnail', $nameFile);

        //create small thumbnail
        $thumbnailpath = public_path('storage/essentia/thumbnail/' . $nameFile);
        $this->createThumbnail($thumbnailpath, 150, 93);

        if (!$upload ) {
            throw new UploadException("Falha ao fazer upload");
        }

        return $data;
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

}
