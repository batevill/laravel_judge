@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Lavozim</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('position.index') }}">Lavozimlar</a></li>
                        <li class="breadcrumb-item active">Create Lavozim</li>
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
                                <h3 class="card-title">Create Lavozim</h3>
                                <a href="{{ route('position.index') }}" class="btn btn-primary">Bekor Qilish</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-center">
                                <form action="{{ route('position.store') }}" method="POST" class="w-50">
                                    @csrf
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>{{ $errors->first() }}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <div class="form-group">
                                                <label for="name">name</label>
                                                <input type="name" name="name" class="form-control" id="name"
                                                    placeholder="Enter name" value="{{ old('name') }}">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-lg btn-success float-right">Saqlash</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
