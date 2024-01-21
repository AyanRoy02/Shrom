@extends('admin.master')
@section('admin.content')

<div class="table-responsive pt-3">
  <form action="" method="get" >
    @csrf
    <div class="row" style="padding:15px;">

        <div class="col-md-3">
    </div>
    </div>

  </form>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
              <th style="width: 3%;" scope="col">Order ID</th>
              <th style="width: 6%;"scope="col">Client name</th>
              <th style="width: 5%;"scope="col">Email</th>
              <th style="width: 5%;"scope="col">Jobpost Id</th>
              <th style="width: 7%;"scope="col">Jobposter Name</th>
              <th style="width: 7%;"scope="col">Jobpost Title</th>
              <th style="width: 5%;"scope="col">Jobpost Category</th>
              <th style="width: 5%;"scope="col">Total Price</th>
              <th style="width: 8%;"scope="col">Delivery Status</th>
              <th style="width: 8%;"scope="col">Payment Status</th>
            </tr>
          </thead>

          <tbody>

            @forelse ($orders as $order)
            <tr>

                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->user->email }}</td>
                <td>{{ $order->jobPost->id }}</td>
                <td>{{ $order->jobPost->name }}</td>
                <td>{{ $order->jobPost->title }}</td>
                <td>{{ $order->jobPost->category }}</td>
                <td>{{ $order->jobPost->total_price }}</td>
                <td>{{ $order->order->status }}</td>
                <td>SslCommerz</td>
            </tr>
            @empty

                <p style="color:red; text-align:center;">No orders found</p>
                @endforelse
          </tbody>

    </table>
</div>
@endsection
