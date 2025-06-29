@extends('layouts.app')
@section('title')
    Pages List
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <x-page-title title="Pages" subtitle="Pages List" />
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <h6 class="mb-0 text-uppercase">Pages List</h6>
        <div class="ms-auto">
            <a href="{{route('pages.create')}}" class="btn btn-outline-primary">Create New Item</a>
        </div>
    </div>


    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Sort</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $items as $item )
                            <tr>
                                <td>@if($item->parent_id) - @endif{{$item->title}}</td>
                                <td>{{$item->parent?->title}}</td>
                                <td>{{$item->sort}}</td>
                                <td>{{$item->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                                <td>
                                    <form action="{{route('pages.destroy',['page'=>$item->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('pages.edit',['page'=>$item->id])}}" class="btn btn-outline-primary">Edit</a>
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Sort</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
