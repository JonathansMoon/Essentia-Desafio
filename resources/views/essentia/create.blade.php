@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('custom/css/forms.css')}}">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header bg-purple border-0">Dashboard</div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{!isset($client->id) ? route('client.store') : route('client.update', $client->id ?? '')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($client->id)
                            {{ method_field('PATCH')}}
                        @endisset

                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-text" id="inputGroup-sizing-default">Nome</span>
                                </div>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name', $client->name ?? '')}}" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-text" id="inputGroup-sizing-default">Email</span>
                                </div>
                                <input type="email" id="email" name="email" class="form-control" value="{{old('email', $client->email ?? '')}}" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-text" id="inputGroup-sizing-default">Telefone</span>
                                </div>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone', $client->phone ?? '')}}" required>
                            </div>

                            <div class="form-group">
                                <input type="file" name="photo" class="form-control-file" id="customFile" value="{{old('photo')}}">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
