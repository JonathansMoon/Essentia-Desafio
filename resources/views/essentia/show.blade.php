@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3 card-profile">
                    <div class="card shadow-lg">
                        <div class="card-horizontal">
                            <div class="img-profile">
                                <img class="card-img-top img-fluid" src=" {{ url("storage/essentia/{$client->photo}") }}">
                            </div>
                            <div class="card-body-profile">
                                <h4 class="card-name-profile text-purple">{{$client->name}}</h4>

                                <dl>
                                    <dd class="list-item">
                                        <strong> Email: </strong>
                                        <span class="badge badge-light">{{$client->email}}</span>
                                    </dd>
                                    <dd class="list-item">
                                        <strong> Phone: </strong>
                                        <span class="badge badge-light">{{$client->phone}}</span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.tab-pane -->

@push('js')
    <script src="{{asset('custom/js/modalsCustom.js')}}"></script>
@endpush
@endsection
