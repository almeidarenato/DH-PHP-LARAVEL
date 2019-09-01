@extends('layouts.master')
@section('title','Blockbuster DH - Home')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Seja Bem-Vindo {{Auth::user()->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
