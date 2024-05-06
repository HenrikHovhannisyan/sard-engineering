@extends('admin.layouts.app')
@section('title')
    Partners
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Partners</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('partners.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Create New Partner
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/uploaded/partner/{{ $partner->image }}" width="100px"></td>
                    <td>{{ $partner->name }}</td>
                    <td>
                        <form action="{{ route('partners.destroy',$partner->id) }}" method="POST">

                            <a class="btn btn-outline-success" href="{{ route('partners.show',$partner->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a class="btn btn-outline-primary" href="{{ route('partners.edit',$partner->id) }}">
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
    </div>

    {!! $partners->links('vendor.pagination.bootstrap-4') !!}

@endsection
