@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header" style="background: #222e3c">
                <span class="card-title mb-0 d-flex justify-content-between">
                    <h4 style="color: #e9ecef">{{ $colour->title }} : Colour</h4>
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



                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Category" class="form-label">Category
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="Title" class="form-control" value="{{ $colour->categories->title }}"
                            readonly disabled>
                        @error('category_id') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Title" class="form-label">Title
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="Title" class="form-control" value="{{ $colour->title }}" readonly
                            disabled>
                        @error('title') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Slug" class="form-label">Slug
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="Slug" class="form-control" value="{{ $colour->slug }}" readonly disabled>
                        @error('slug') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col md-12">
                        <label for="Slug" class="form-label">Description
                            <span class="text-danger">*</span>
                        </label>
                        <textarea type="text" id="Slug" class="form-control" rows="3" readonly
                            disabled> {{ $colour->description }}</textarea>
                        @error('description') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="Image" class="form-label">Status
                            <span class="text-danger">*</span>
                        </label>
                        <div class="">
                            @if ($colour->status == '0')
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" checked="checked" disabled>
                                <label class="form-check-label" for="visible">Visible</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" disabled>
                                <label class="form-check-label" for="inlineRadio2">Hide</label>
                            </div>
                            @elseif ($colour->status == '1')
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" disabled>
                                <label class="form-check-label" for="visible">Visible</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" checked="checked" disabled>
                                <label class="form-check-label" for="inlineRadio2">Hide</label>
                            </div>
                            @endif

                        </div>
                    </div>
                    @error('status') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                </div>

                <hr class=" mb-3 mt-4">



            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="background: #222e3c">
                <span class="card-title mb-0 d-flex justify-content-between">
                    <h4 style="color: #e9ecef">Existing Colour</h4>
                </span>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    @forelse ($allColour as $colourItem)
                    <div class="d-flex justify-content-between mb-3">

                        <span class="d-flex align-items-center text-capitalize"
                            style="font-size: 16px; font-weight:bold">{{
                            $colourItem->title }}</span>

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