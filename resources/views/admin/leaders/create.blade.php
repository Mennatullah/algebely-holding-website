@extends('layouts.app')
@section('title')
    Leader Create
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Leader" subtitle="Leader Create"/>

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Leader Input</h6>
            <hr>
            <form action="{{route('leaders.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Name (English):</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name_en') ? ' is-invalid' : '' }}"
                                           value="{{old('name_en')}}" name="name_en">
                                    @error('name_en')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name (Arabic):</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('name_ar') ? ' is-invalid' : '' }}"
                                           value="{{old('name_ar')}}" name="name_ar">
                                    @error('name_ar')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Position (English):</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('position_en') ? ' is-invalid' : '' }}"
                                           value="{{old('position_en')}}" name="position_en">
                                    @error('position_en')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Position (Arabic):</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('position_ar') ? ' is-invalid' : '' }}"
                                           value="{{old('position_ar')}}" name="position_ar">
                                    @error('position_ar')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Image:</label>
                                    <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           type="file" id="formFile" name="image">
                                    @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sort:</label>
                                    <input type="number"
                                           class="form-control {{ $errors->has('sort') ? ' is-invalid' : '' }}"
                                           value="{{old('sort') ?? 0}}" name="sort" min="0">
                                    @error('sort')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input {{ $errors->has('is_active') ? ' is-invalid' : '' }}"
                                           value="{{old('is_active') ?? 1}}" type="checkbox" id="flexSwitchCheckChecked"
                                           checked name="is_active">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Is Active</label>
                                    @error('is_active')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end row-->

@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
