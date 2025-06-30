@extends('layouts.app')
@section('title')
    Menu Edit
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Menu" subtitle="Menu Edit" />

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Menu Input</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('menus.update',['menu'=>$item->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Title (English):</label>
                            <input type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" value="{{$item->title ?? old('title_en')}}" name="title_en">
                            @error('title_en')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title (Arabic):</label>
                            <input type="text" class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }}" value="{{$item->translate('ar')->title ?? old('title_ar')}}" name="title_ar">
                            @error('title_ar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parent Menu:</label>
                            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="parent_id">
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
