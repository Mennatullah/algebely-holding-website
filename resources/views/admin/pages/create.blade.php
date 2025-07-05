@extends('layouts.app')
@section('title')
    Page & Section Create
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Page" subtitle="Page & Section Create"/>

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Page & Section Input</h6>
            <hr>
            <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Title (English):</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}"
                                           value="{{old('title_en')}}" name="title_en">
                                    @error('title_en')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title (Arabic):</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }}"
                                           value="{{old('title_ar')}}" name="title_ar">
                                    @error('title_ar')
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
                                    <textarea type="text"
                                              class="form-control {{ $errors->has('description_en') ? ' is-invalid' : '' }}"
                                              name="description_en" rows="3">{{old('description_en')}}</textarea>
                                    @error('description_en')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description (Arabic):</label>
                                    <textarea type="text"
                                              class="form-control {{ $errors->has('description_ar') ? ' is-invalid' : '' }}"
                                              name="description_ar" rows="3">{{old('description_ar')}}</textarea>
                                    @error('description_ar')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content (English):</label>
                                    <textarea type="text"
                                              class="form-control summernote {{ $errors->has('content_en') ? ' is-invalid' : '' }}"
                                              name="content_en" rows="7">{{old('content_en')}}</textarea>
                                    @error('content_en')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content (Arabic):</label>
                                    <textarea type="text"
                                              class="form-control summernote {{ $errors->has('content_ar') ? ' is-invalid' : '' }}"
                                              name="content_ar" rows="7">{{old('content_ar')}}</textarea>
                                    @error('content_ar')
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
                                <div class="mb-3">
                                    <label class="form-label">Link:</label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}"
                                           value="{{old('link')}}" name="link">
                                    @error('link')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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
                                    <label class="form-label">Main Page:</label>
                                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example"
                                            name="parent_id">
                                        <option value="" selected>Please Select Parent if needed</option>
                                        @forelse ( $parents as $parent )
                                            <option value="{{$parent->id}}">{{$parent->title}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('parent_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input {{ $errors->has('is_active') ? ' is-invalid' : '' }}"
                                           value="{{old('is_active') ?? 1}}" type="checkbox" id="flexSwitchCheckChecked"
                                           checked
                                           name="is_active">
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']], // this adds H1, H2, etc.
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview']]
                ],
                callbacks: {
                    onInit: function () {
                        $('.note-editable').css('background-color', '#fff');
                        $('.note-editable').css('color', '#000');
                    }
                }
            });
        });
    </script>
@endpush
