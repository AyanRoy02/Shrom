@extends('admin.master')
@section('admin.content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:rgb(0, 138, 202);font-size:25px; text-align:center;">Slider</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>

                            <tr>

                                <th style="width: 5%;">ID</th>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 20%;"> Second title</th>
                                <th style="width: 50%;"> Description</th>
                                <th style="width: 25%;">Action</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($slider as $key => $slide)
                                <tr>
                                    <td class="py-1">{{ $key + 1 }}

                                    </td>
                                    <td class="py-1">{{ $slide->title }}

                                    </td>
                                    <td class="py-1">{{ $slide->sec_title }}

                                    </td>
                                    <td class="py-1">{!! $slide->description !!}

                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-2">
                                                <a href="{{ url('slider/' . $slide->id . '/edit') }}"
                                                    class=" btn btn-info btn-sm"> <i class="las la-edit"></i></a>
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ url('/slider', $slide->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
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
