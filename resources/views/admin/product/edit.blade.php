@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Product
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.product.update', ['id' => isset($viewData['product']) ? $viewData['product']->getId() : 0]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nama</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ isset($viewData['product']) ? $viewData['product']->getName() : '' }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Harga</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" value="{{ isset($viewData['product']) ? $viewData['product']->getPrice() : 0 }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        &nbsp;
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="3">{{ isset($viewData['product']) ? $viewData['product']->getDescription() : '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection