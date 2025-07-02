@extends('layouts.app')
@section('title')
    Contact List
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <x-page-title title="Contact" subtitle="Contact List" />
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <h6 class="mb-0 text-uppercase">Contact List</h6>
    </div>


    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $items as $item )
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    @if($item->is_active == 1)
                                        <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Active</p>
                                    @else
                                        <p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Not Active</p>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('contacts.destroy',['contact'=>$item->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('contacts.edit',['contact'=>$item->id])}}" class="btn btn-outline-primary">Edit</a>
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
                            <th>Phone</th>
                            <th>Type</th>
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
