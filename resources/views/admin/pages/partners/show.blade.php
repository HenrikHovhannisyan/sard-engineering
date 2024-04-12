@extends('admin.layouts.app')
@section('title')
    Show Partner
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Partner</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('partners.index') }}">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img src="/uploaded/partner/{{ $partner->image }}" class="img-fluid mt-3 mb-3" width="500px">
            </div>
        </div>
        <hr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $partner->name }}
            </div>
        </div>
    </div>

@endsection
