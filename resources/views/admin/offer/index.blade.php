@extends('layouts.admin')

@section('content')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Offer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Offer</li>
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
                                <h3 class="card-title">Offer</h3>
                                <a href="{{ route('offer.create') }}" class="btn btn-primary">Create Offer</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Lavozim</th>
                                        <th>Ganarar Foizi</th>
                                        <th>Azolar</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($offers->count())
                                        @foreach ($offers as $offer)
                                            <tr>
                                                <td>{{ $offer->id }}</td>
                                                <td>{{ $offer->position->name }}</td>
                                                <td>{{ $offer->position_gonarar }} %</td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="#" id="suspendd" data-toggle="modal"
                                                            data-target="#demoModal{{ $offer->id }}"
                                                            class="btn btn-sm bg-danger-light">Ko`rish</a>
                                                    </div>
                                                </td>
                                                <!-- Modal Example Start-->
                                                <div class="modal fade" id="demoModal{{ $offer->id }}"
                                                    value="{{ $offer->id }}" tabindex="-1" role="dialog" aria-
                                                    labelledby="demoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="demoModalLabel{{ $offer->id }}">
                                                                    Offer azolari</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria- label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-10">
                                                                    <label for="">F.I.SH</label><br>
                                                                    @foreach ($offer->offerchild as $child)
                                                                        {{ $child->user->name }} <br>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Example End-->
                                                <td class="d-flex" style="width: 150px">
                                                    <a href="{{ route('offer.edit', [$offer->id]) }}"
                                                        class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $offer->id }}"
                                                        action="{{ route('offer.destroy', $offer->id) }}" class="mr-1"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete({{ $offer->id }})"> <i
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
                            {{ $offers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(offerId) {
            if (confirm('Ma\'lumotni o\'chirishga ishonchingiz komilmi?')) {
                document.getElementById('delete-form-' + offerId).submit();
            }
        }
    </script>
@endsection
