
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
                            <h3 class="card-title">Update Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('/admin/general-setting/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$settings->phone}}" id="phone"
                                        placeholder="Enter Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control" value="{{$settings->email}}" id="email"
                                        placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="summernote">{{$settings->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook Link (optional)</label>
                                    <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}" id="facebook"
                                        placeholder="Enter facebook ID">
                                </div>

                                <div class="form-group">
                                    <label for="twiter">twiter Link (optional)</label>
                                    <input type="text" name="twiter" class="form-control" value="{{$settings->twiter}}" id="twiter"
                                        placeholder="Enter twiter ID">
                                </div>
                                
                                <div class="form-group">
                                    <label for="instagram">instagram Link (optional)</label>
                                    <input type="text" name="instagram" class="form-control" value="{{$settings->instagram}}" id="instagram"
                                        placeholder="Enter instagram ID">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin">linkedin Link (optional)</label>
                                    <input type="text" name="linkedin" class="form-control" value="{{$settings->linkedin}}" id="linkedin"
                                        placeholder="Enter linkedin ID">
                                </div>
                                <div class="form-group">
                                    <label for="youtube">Youtube Link (optional)</label>
                                    <input type="text" name="youtube" class="form-control" value="{{$settings->youtube}}" id="youtube"
                                        placeholder="Enter youtube ID">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input"
                                                id="logo" accept="image/*" rewuired>
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                        </div>
                                    </div>
                                    <img src="{{asset('backend/images/settings/'.$settings->logo)}}" alt="logo" width="100px" height="100px">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubdate</button>
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
    
@endpush

