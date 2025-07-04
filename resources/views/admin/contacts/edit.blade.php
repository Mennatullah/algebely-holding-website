@extends('layouts.app')
@section('title')
    Contact Edit
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Contact" subtitle="Contact Edit" />

    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Contact Input</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('contacts.update',['contact'=>$item->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$item->name ?? old('name')}}" name="name" disabled>
                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone:</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$item->phone ?? old('phone')}}" name="phone" disabled>
                            @error('phone')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$item->email ?? old('email')}}" name="email" disabled>
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type:</label>
                            <input type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" value="{{$item->type ?? old('type')}}" name="type" disabled>
                            @error('type')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @if(isset($item) && isset($item->cv))
                        <div class="mb-3">
                            <label class="form-label">CV:</label>
                            <a href="{{asset('storage/'.$item->cv)}}" target="_blank" class="dash-lable mb-0 bg-success bg-opacity-10 text-primary rounded-2">Please check cv</a>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Message:</label>
                            <textarea type="text" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}"
                                      name="message" rows="3" disabled>{!! $item->message ?? old('message') !!}</textarea>
                            @error('message')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input {{ $errors->has('is_active') ? ' is-invalid' : '' }}" value="1" type="checkbox" id="flexSwitchCheckChecked" @if($item->is_active == 1) checked @endif  name="is_active">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Is Replied</label>
                            @error('is_active')
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
