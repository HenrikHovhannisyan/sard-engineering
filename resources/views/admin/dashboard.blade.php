@extends('admin.layouts.app')
@section('title')
    Admin
@endsection

@section('content')
    <div class="container-fluid">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-sm-6 col-lg-3 border rounded shadow-sm bg-success text-white p-3">
                <div class="text-end">
                    <i class="fa-solid fa-images fa-5x"></i>
                </div>
                <div class="d-flex justify-content-between align-items-start mt-3">
                    <h3 class="m-0">Images - {{ $imageCount }}</h3>
                    <a href="{{route('images.index')}}" class="btn btn-outline-light ">
                        View
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 border rounded shadow-sm bg-danger text-white p-3">
                <div class="text-end">
                    <i class="fa-solid fa-handshake fa-5x"></i>
                </div>
                <div class="d-flex justify-content-between align-items-start mt-3">
                    <h3 class="m-0">Partners - {{ $partnerCount }}</h3>
                    <a href="{{route('partners.index')}}" class="btn btn-outline-light ">
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
