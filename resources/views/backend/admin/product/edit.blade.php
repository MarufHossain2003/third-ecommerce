@extends('backend.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Eit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('/admin/product/update/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}" id="name"
                                        placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="sku_code">SKU Code</label>
                                    <input type="text" name="sku_code" value="{{$product->sku_code}}" class="form-control" id="sku_code"
                                        placeholder="Enter SKU Code" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="cat_id">Select Category</label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($product->cat_id == $category->id)
                                                selected
                                            @endif >{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_cat_id">Select Subcategory</label>
                                    <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                        <option selected disabled>Select Category(Optional)</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" @if ($product->sub_cat_id == $subCategory->id)
                                                selected
                                            @endif >{{ $subCategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group" id="color_fields">
                                    <label for="color">Product Color(optional)</label>
                                    @foreach ($product->color as $name)
                                        <input type="text" name="color[]" value="{{$name->color_name}}" class="form-control mt-2" id="color"
                                        placeholder="Enter Color">
                                    @endforeach
                                    
                                </div>
                                <button type="button" class="btn btn-primary" id="add_color">Add More</button>
                                <button type="button" class="btn btn-danger" id="remove_blank_colors">Remove Blank Fields</button>

                                <div class="form-group" id="size_fields">
                                    <label for="size">Product Size(optional)</label>
                                    @foreach ($product->size as $name)
                                      <input type="text" name="size[]" value="{{$name->size_name}}" class="form-control mt-2" id="size"
                                        placeholder="Enter Size">  
                                    @endforeach
                                 
                                </div>
                                <button type="button" class="btn btn-primary" id="add_size">Add More</button>
                                <div class="form-group">
                                    <label for="qty">Product Quantity</label>
                                    <input type="number" name="qty" value="{{$product->qty}}" class="form-control" id="qty"
                                        placeholder="Enter Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="buy_price">Buy Price</label>
                                    <input type="text" name="buy_price" value="{{$product->buy_price}}" class="form-control" id="buy_price"
                                        placeholder="Enter Buy Price">
                                </div>
                                <div class="form-group">
                                    <label for="regular_price">Regular Price</label>
                                    <input type="text" name="regular_price" value="{{$product->regular_price}}" class="form-control" id="regular_price"
                                        placeholder="Enter Regular Price">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Discount Price</label>
                                    <input type="text" name="discount_price" value="{{$product->discount_price}}" class="form-control" id="discount_price"
                                        placeholder="Enter Discount Price">
                                </div>
                                <div class="form-group">
                                    <label for="product_type">Product Type</label>
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option selected disabled>Select Type</option>
                                        <option value="hot" @if ($product->product_type == "hot")
                                            selected
                                        @endif >Hot Product</option>
                                        <option value="new" @if ($product->product_type == "new")
                                        selected
                                    @endif >New Arraival</option>
                                        <option value="regular" @if ($product->product_type == "regular")
                                        selected
                                    @endif  >Regular Product</option>
                                        <option value="discount" @if ($product->product_type == "discount")
                                        selected
                                    @endif  >Discount Product</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="short_desc">Short Details</label>
                                    <textarea name="short_desc" id="summernote">{{$product->short_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="long_desc">Long Details</label>
                                    <textarea name="long_desc" id="summernote2">{{$product->long_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="product_policy">Product Policy</label>
                                    <textarea name="product_policy" id="summernote3">{{$product->product_policy}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="image" accept="image/*" >
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <img src="{{asset('backend/images/product/'.$product->image)}}"  alt="Product Image" height="100" width="100" class="shadow p-3 bg-white rounded mt-4">
                                </div>

                                <div class="form-group">
                                    <label for="galleryImage">Gallery Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="galleryImage[]" class="custom-file-input"
                                                id="galleryImage" multiple accept="image/*" >
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    @foreach ($product->galleryImage as $image)
                                        <img src="{{asset('backend/images/galleryImage/'.$image->image)}}" alt="Gallery Image" height="100" width="100" class="shadow p-3 bg-white rounded mt-4">                                        
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.card -->
@endsection

@push('script')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(function() {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(function() {
            // Summernote
            $('#summernote3').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
    $(document).ready(function() {
        // Add new color field
        $("#add_color").click(function() {
            $("#color_fields").append(
                '<input type="text" name="color[]" class="form-control mt-2 color-field" placeholder="Enter Color">'
            );
        });

        // Remove blank color fields
        $("#remove_blank_colors").click(function() {
            $("#color_fields .color-field").each(function() {
                if (!$(this).val().trim()) {
                    $(this).remove();
                }
            });
        });
    });
</script>

    <script>
        $(document).ready(function() {
            $("#add_size").click(function() {
                $("#size_fields").append(
                    '<input type="text" name="size[]" class="form-control" id="size" placeholder = "Enter Size" > '
                )
            })
        })
    </script>
@endpush
