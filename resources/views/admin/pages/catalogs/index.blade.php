@extends('admin.layouts.app')
@section('title')
    Catalogs
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Catalogs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('catalogs.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Create New Catalog
                </a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
            <th>File</th>
            <th>Brand</th>
            <th width="150px">Action</th>
        </tr>
        @foreach ($catalogs as $catalog)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $catalog->name }}</td>
                <td><img src="/uploaded/catalogs/images/{{ $catalog->image }}" width="100px"></td>
                <td>
                    <a href="/uploaded/catalogs/files//{{ $catalog->file }}" class="btn btn-outline-success" target="_blank">
                        Open File
                    </a>
                </td>
                <td>{{ $catalog->brand }}</td>
                <td>
                    <form action="{{ route('catalogs.destroy',$catalog->id) }}" method="POST">

                        <a class="btn btn-outline-primary" href="{{ route('catalogs.edit',$catalog->id) }}">
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

    {!! $catalogs->links() !!}

@endsection
