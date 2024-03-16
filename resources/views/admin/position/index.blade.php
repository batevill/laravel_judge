@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Lavozim</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Lavozim</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Lavozim</h3>
                                <a href="{{ route('position.create') }}" class="btn btn-primary">Create Lavozim</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($positions->count())
                                        @foreach ($positions as $position)
                                            <tr>
                                                <td>{{ $position->id }}</td>
                                                <td>{{ $position->name }}</td>
                                                <td class="d-flex" style="width: 150px">
                                                    <a href="{{ route('position.edit', [$position->id]) }}"
                                                        class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $position->id }}"
                                                        action="{{ route('position.destroy', $position->id) }}" class="mr-1"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete({{ $position->id }})"> <i
                                                                class="fas fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">
                                                <h5 class="text-center">No categories found.</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            {{ $positions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(userId) {
            if (confirm('Ma\'lumotni o\'chirishga ishonchingiz komilmi?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection
