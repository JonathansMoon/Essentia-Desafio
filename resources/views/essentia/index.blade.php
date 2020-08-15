@extends('layouts.app')

@push('styles')
<link href="{{asset('vendor/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('custom/css/index.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="create-buttom">
                    <a href="{{route('client.create')}}" class="btn btn-light shadow">Novo Cliente</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <table class="table" id="myTable">
                        <thead class="thead-purple">
                            <tr>
                                <th style="text-align:center">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td scope="row"> <div class="circle"> <img src=" {{ url("storage/essentia/thumbnail/{$client->photo}") }}"> </div> </td>
                                <td scope="row">{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone}}</td>
                                <td class="td-action">
                                    <form action="{{route('client.destroy', $client->id)}}" method="POST">
                                        @csrf
                                        <a href="{{route('client.show', $client->id)}}" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('client.edit', $client->id)}}" class="btn btn-sm btn-outline-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{asset('vendor/js/dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('custom/js/dataTableCustom.js')}}"></script>
@endpush
@endsection
