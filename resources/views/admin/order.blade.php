<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
    .title-deg {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }

    .center {
        margin: auto;
        width: 100%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .th_deg {
        padding: 10px;
    }
    .th_color {
        background: skyblue;
    }
    .image_size {
        width: 150px;
        height: 150px;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="title-deg">All Orders</h1>

                <div style="padding-left: 500px; padding-bottom: 30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" name="search" id="" placeholder="Search...">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Payment Status</th>
                        <th class="th_deg">Delivery Status</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delivered</th>
                        <th class="th_deg">Print PDF</th>
                        <th class="th_deg">Send Email</th>
                    </tr>
                    @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img src="/product/{{$order->image}}" class="image_size img-fluid" alt="...">
                        </td>
                        <td>
                            @if($order->delivery_status == 'Processing')
                            <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are You Sure Delivered This Product !!!')" class="btn btn-primary">Delivered</a>

                            @else
                            <p style="color: green;">Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>

                        <td>
                            <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Send Email</a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="13" style="padding: 13px;">
                            No Data Found
                        </td>
                    </tr>

                    @endforelse
                </table>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>