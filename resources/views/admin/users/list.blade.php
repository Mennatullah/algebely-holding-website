@extends('layouts.app')
@section('title')
    User List
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <x-page-title title="User" subtitle="User List" />
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <h6 class="mb-0 text-uppercase">User List</h6>
        <div class="ms-auto">
            <a href="{{route('users.create')}}" class="btn btn-outline-primary">Create New Item</a>
        </div>
    </div>


    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $items as $item )
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <form action="{{route('users.destroy',['user'=>$item->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('users.edit',['user'=>$item->id])}}" class="btn btn-outline-primary">Edit</a>
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
