<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .font_size {
        font-size: 40px;
        padding-bottom: 40px;
    }

    label {
        display: inline-block;
        width: 200px;
    }

    .div_design {
        padding-bottom: 15px;
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

                @if(session()->has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('error')}}
                </div>
                @endif

                @if(session()->has('dicount_error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('dicount_error')}}
                </div>
                @endif
                
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>

                    <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">Product Title :</label>
                            <input type="text" name="title" id="title" placeholder="Write a title" Required>
                        </div>
                        <div class="div_design">
                            <label for="description">Product Description :</label>
                            <input type="text" name="description" id="description" placeholder="Write a Description"
                                Required>
                        </div>
                        <div class="div_design">
                            <label for="price">Product Price :</label>
                            <input type="number" name="price" id="price" placeholder="Write a Price" Required>
                        </div>
                        <div class="div_design">
                            <label for="dis_price">Discount Price :</label>
                            <input type="number" name="dis_price" id="dis_price" placeholder="Discount Price Here">
                        </div>
                        <div class="div_design">
                            <label for="quantity">Product Quantity :</label>
                            <input type="number" name="quantity" id="quantity" min="0" placeholder="Write a Quentity"
                                Required>
                        </div>

                        <div class="div_design">
                            <label for="catagory">Product Catagory :</label>
                            <select name="catagory" id="catagory" Required>
                                <option value="" selected="">Add A Catagory Here</option>
                                @foreach($catagory as $catagory)
                                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="image">Product Images :</label>
                            <input type="file" name="image" id="image" Required>
                        </div>

                        <div class="div_design">
                            <input type="submit" name="" value="Add Product" class="btn btn-primary" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>