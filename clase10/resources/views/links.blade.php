@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Links</div>

                <div class="card-body">
                    <div>
                        <ul>
                            <li><a href="https://www.adidas.com.ar">adidas.com.ar</a></li>
                            <li><a href="https://www.nike.com.ar">nike.com.ar</a></li>
                            <li><a href="https://www.topper.com.ar">topper.com.ar</a></li>
                        </ul>
                    </div>
                    @if ($user->role == 'admin')
                        <ul>
                            <li><a href="https://www.nike.com/jordan">nike.com/jordan</a></li>
                            <li><a href="https://www.nike.com">nike.com</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection