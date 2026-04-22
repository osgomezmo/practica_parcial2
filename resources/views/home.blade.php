@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <!-- MENÚ -->
                    @auth
                        <a href="{{ route('recipes.index') }}">👤 RECETAS</a>
                    @else
                        <a href="{{ route('login') }}">Debes iniciar sesión primero</a>
                    @endauth                
                  
            </div>
        </div>
    </div>
</div>
@endsection
