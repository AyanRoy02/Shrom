@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">All Category</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%;">SI No</th>
                                <th style="width: 20%;">Subscribers</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $key => $subscribe)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>{{ $subscribe->email }}

                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-2">
                                                <form action="{{ url('/delete-subscribers/' . $subscribe->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button class=" btn btn-danger btn-sm"> <i class="las la-trash-alt"
                                                            style="color:rgb(243, 243, 243);"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
