@extends('frontend.master')
@section('content')
    <section class="return-process-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <form action="{{url('/applicant-form/submit')}}" method="POST" class="return-process-form form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <h3 class="return-process-form-title">Applicant Form</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item-wrapper">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="Enter Your Name*" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item-wrapper">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" placeholder="Phone*" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item-wrapper">
                                    <label for="email">Email Id</label>
                                    <input type="email" name="email" placeholder="Email Id*" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item-wrapper">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" placeholder="Address*" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="course_name">Select Course Name</label>
                                    <select name="course_name" id="course_name" class="form-control">
                                        <option selected disabled>Select Your Desire Course Name</option>
                                        <option >Computer Office Application (COA)</option>
                                        <option >Computer Grafics Design And Multimedia Programming</option>
                                    </select>
                            </div>
                        </div>
                        <div class="return-process-btn-outer">
                            <button type="submit" id="productReturnProcess" class="return-process-btn-inner">
                                Submit
                            </button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </section> 
@endsection