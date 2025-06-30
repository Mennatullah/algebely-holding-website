@extends('layouts.app')
@section('title')
    Leader Edit
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
    <style>
        .hai-img {
            width: 200px;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
@endpush
@section('content')
    <x-page-title title="Leader" subtitle="Leader Edit" />

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Leader Input</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('leaders.update',['leader'=>$item->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Name (English):</label>
                            <input type="text" class="form-control {{ $errors->has('name_en') ? ' is-invalid' : '' }}" value="{{$item->name ?? old('name_en')}}" name="name_en">
                            @error('name_en')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name (Arabic):</label>
                            <input type="text" class="form-control {{ $errors->has('name_ar') ? ' is-invalid' : '' }}" value="{{$item->translate('ar')->name ?? old('name_ar')}}" name="name_ar">
                            @error('name_ar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Position (English):</label>
                            <input type="text" class="form-control {{ $errors->has('position_en') ? ' is-invalid' : '' }}" value="{{$item->position ?? old('position_en')}}" name="position_en">
                            @error('position_en')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Position (Arabic):</label>
                            <input type="text" class="form-control {{ $errors->has('position_ar') ? ' is-invalid' : '' }}" value="{{$item->translate('ar')->position ?? old('position_ar')}}" name="position_ar">
                            @error('position_ar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image:</label>
                            <img src="{{isset($item) && isset($item->image) ? asset('storage/'.$item->image) : ''}}" alt="store image" class="hai-img">
                            <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" id="formFile" name="image">
                            @error('image')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sort:</label>
                            <input type="number" class="form-control {{ $errors->has('sort') ? ' is-invalid' : '' }}" value="{{$item->sort}}" name="sort" min="0">
                            @error('sort')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input {{ $errors->has('is_active') ? ' is-invalid' : '' }}" value="1" type="checkbox" id="flexSwitchCheckChecked" @if($item->is_active == 1) checked @endif  name="is_active">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Is Active</label>
                            @error('is_active')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
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
