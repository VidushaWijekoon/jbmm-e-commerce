@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header" style="background: #222e3c">
                <span class="card-title mb-0 d-flex justify-content-between">
                    <h4 style="color: #e9ecef" class="text-capitalize">{{ $brand->title }} Brand Edit</h4>
                </span>
            </div>

            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning bg-warning p-3 mb-3 rounded-3">
                    @foreach ($errors->all() as $error)
                    <div class="">{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/brand/' . $brand->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="Category" class="form-label">Category
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="Title" class="form-control" value="{{ $brand->categories->title }}"
                                name="category_id" readonly disabled>
                            @error('category_id') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="Title" class="form-label">Title
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="Title" class="form-control" value="{{ $brand->title }}" name="title">
                            @error('title') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="Slug" class="form-label">Slug
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="Slug" class="form-control" value="{{ $brand->slug }}" name="slug">
                            @error('slug') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col md-12">
                            <label for="Slug" class="form-label">Description
                                <span class="text-danger">*</span>
                            </label>
                            <textarea type="text" id="Slug" class="form-control" rows="3"
                                placeholder="Brand Description" name="description">{{ $brand->description }}</textarea>
                            @error('description') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12">
                            <label for="Image" class="form-label">Image
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" id="Image" class="form-control" name="image"
                                accept="image/x-png, image/gif, image/jpeg, image/png, image/jpg">
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->image }}" width="75" class="mt-2">
                            @error('image') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12">
                            <label for="Image" class="form-label">Status
                                <span class="text-danger">*</span>
                            </label>
                            <div class="">
                                @if ($brand->status == "0")
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="visible" value="0"
                                        checked>
                                    <label class="form-check-label" for="visible">Visible</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                        value="0">
                                    <label class="form-check-label" for="inlineRadio2">Hide</label>
                                </div>
                                @elseif($brand->status == '1')
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="visible" value="0"
                                        checked>
                                    <label class="form-check-label" for="visible">Visible</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                        value="0" checked>
                                    <label class="form-check-label" for="inlineRadio2">Hide</label>
                                </div>
                                @endif

                            </div>
                        </div>
                        @error('status') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>



                    <hr class=" mb-3 mt-4">

                    <button type="submit" class="btn btn-sm btn-info float-end">Edit {{ ucfirst($brand->title) }}
                        Brand</button>

                </form>

            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="background: #222e3c">
                <span class="card-title mb-0 d-flex justify-content-between">
                    <h4 style="color: #e9ecef">Existing Brand</h4>
                </span>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    @forelse ($allBrand as $brandItem)
                    <div class="d-flex justify-content-between mb-3">

                        <span class="d-flex align-items-center text-capitalize">{{ $brandItem->title }}</span>
                        <span>
                            <img src="{{ asset($brandItem->image) }}" alt="{{$brandItem->title}}" height="50">
                        </span>

                    </div>
                    @empty
                    <span>No Category Has Been Created</span>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection