<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    .center {
        margin: auto;
        width: 80%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .image_size {
        width: 150px;
        height: 150px;
    }

    .th_color {
        background: skyblue;
    }

    .th_deg {
        padding: 20px;
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">All Products</h2>
                </div>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Catagory</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="image_size img-fluid" src="/product/{{$product->image}}" alt="...">
                        </td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this item')"
                                href="{{url('delete_product',$product->id)}}">Delete</a></td>
                        <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>