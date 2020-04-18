@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif    
                 @if(Auth::user()->avatar)
                 <img src="{{ Auth::user()->avatar }}" class="rounded" alt="hello" width="208px">
                 @else
                 <img src="{{ asset('public/images/no-image.png') }}" class="rounded" alt="hello" width="208px">
                 @endif              
                 <h2 class="mt-3">Welcome - {{ ucfirst(Auth::user()->name) }}</h2>
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
