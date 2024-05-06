@extends('admin.layouts.app')
@section('title')
    Brands
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Brands</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('brands.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Create New Brand
                </a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="150px">Action</th>
        </tr>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">

                        <a class="btn btn-outline-primary" href="{{ route('brands.edit',$brand->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $brands->links('vendor.pagination.bootstrap-4') !!}

@endsection
