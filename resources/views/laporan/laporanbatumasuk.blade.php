@extends('layout.admin')
@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Laporan Batu Masuk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laporan Batu Masuk</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        {{-- CRUD --}}
        <!-- Required meta tags -->
        {{--
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> --}}



        <div class="container">
            {{-- search --}}
            <div class=" mb-2">
                {{-- <div class="col-auto">
                <form action="pendafoutlite" method="GET">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                </form>
            </div> --}}


                <form action="{{ route('laporanbatumasuk') }}" method="GET">
                    <div class="input-group">
                        {{-- Button Export PDF --}}
                        <div class="col-md-3">
                            <label for="">Start Date: </label>
                            <input type="date" name="dari" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="">End Date: </label>
                            <input type="date" name="sampai" class="form-control">
                        </div>

                        <div class="pt-4 mr-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                        <div class="pt-4">
                            @if (!empty($filter))
                                <a href="{{ route('laporanbatumasukpdf', $filter) }}" class="btn btn-danger">Export PDF</a>
                            @else
                                <a href="{{ route('laporanbatumasukpdf', 'all') }}" class="btn btn-danger">Export PDF</a>
                            @endif
                        </div>
                        {{-- <form action="{{ url()->current() }}">
                <div class="input-group">
                    <input type="month" name="filter" class="form-control input-sm select2" value="{{ $filter }}">
                        @if (!empty($filter))
                            @foreach ($pendafoutlite as $item)
                                <option value="{{ $item->tanggal }}" {{ $item->tanggal == $filter ? 'selected' : '' }}>
                                    {{ strtoupper($item->tanggal) }}
                                </option>
                            @endforeach
                        @endif
                    <div class="input-group-append ml-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form> --}}




                    </div>
                </form>
            </div>
            <div>
            </div>




            <div class="mt-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="px-6 py-6">No</th>
                            <th class="px-6 py-6">Tanggal</th>
                            <th class="px-6 py-6">Jenis Batu</th>
                            <th class="px-6 py-6">Qty</th>
                            <th class="px-6 py-6">Dari Supplier</th>
                            {{-- <th class="px-6 py-6">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($laporanbatumasuk as $item)
                            <tr>
                                <td class="px-6 py-6">{{ $loop->iteration }}</td>
                                <td class="px-6 py-6">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}
                                </td>
                                <td class="px-6 py-6">{{ $item->jenisbatu }}</td>
                                <td class="px-6 py-6">{{ $item->qty }} TON</td>
                                <td class="px-6 py-6">{{ $item->mastersupplier->namapt }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $laporanbatumasuk->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
