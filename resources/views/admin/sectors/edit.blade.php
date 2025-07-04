@extends('layouts.app')
@section('title')
    Sector & Company Edit
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
    <x-page-title title="Sector" subtitle="Sector & Company Edit" />

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Sector Edit</h6>
            <hr>
            <form action="{{route('sectors.update',['sector'=>$item->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Title (English):</label>
                            <input type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}"
                                   value="{{$item->title ?? old('title_en')}}" name="title_en">
                            @error('title_en')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title (Arabic):</label>
                            <input type="text" class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }}"
                                   value="{{$item->translate('ar')->title ?? old('title_ar')}}" name="title_ar">
                            @error('title_ar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Main Sector:</label>
                            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example"
                                    name="parent_id">
                                <option value="" @if($item->parent_id == null) selected @endif>Please Select Parent if needed</option>
                                @forelse ( $parents as $parent )
                                    @if($parent->id !== $item->id )
                                        <option value="{{$parent->id}}" @if($item->parent_id == $parent->id) selected @endif>{{$parent->title}}</option>
                                    @endif
                                @empty
                                @endforelse
                            </select>
                            @error('parent_id')
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
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Description (English):</label>
                            <textarea type="text" class="form-control {{ $errors->has('description_en') ? ' is-invalid' : '' }}"
                                      name="description_en" rows="3">{!! $item->description ?? old('description_en') !!}</textarea>
                            @error('description_en')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description (Arabic):</label>
                            <textarea type="text" class="form-control {{ $errors->has('description_ar') ? ' is-invalid' : '' }}"
                                      name="description_ar" rows="3">{!! $item->translate('ar')->description ?? old('description_ar') !!}</textarea>
                            @error('description_ar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content (English):</label>
                            <textarea type="text" class="form-control {{ $errors->has('content_en') ? ' is-invalid' : '' }}"
                                      name="content_en" rows="7">{!! $item->description ?? old('content_en') !!}</textarea>
                            @error('content_en')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content (Arabic):</label>
                            <textarea type="text" class="form-control {{ $errors->has('content_ar') ? ' is-invalid' : '' }}"
                                      name="content_ar" rows="7">{!! $item->translate('ar')->content ?? old('content_ar') !!}</textarea>
                            @error('content_ar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link:</label>
                            <input type="text" class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{$item->link ?? old('link')}}" name="link">
                            @error('link')
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
                            <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
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
