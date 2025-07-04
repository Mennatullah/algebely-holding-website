@extends('layouts.app')
@section('title')
    Admin Edit
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Admin" subtitle="Admin Edit" />

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Admin Input</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('users.update',['user'=>$item->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$item->name ?? old('name')}}" name="name">
                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$item->email ?? old('email')}}" name="email">
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="text" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
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
