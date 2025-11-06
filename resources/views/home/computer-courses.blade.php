@extends('frontend.master')
@section('content')
    <section class="return-process-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="text-center">
                        <h1>Computer Coures Details:</h1>
                    </div>
                    <div class="computer-courses-content">
                        <h3 class="return-process-form-title">Computer Office Application (COA)</h3>
                        <h4>Duration:</h4>
                        <ol>
                            <li><strong>6 Months </strong>(Typically 360 hours of training)</li>
                        </ol>
                        <h4>Class Schedule:</h4>
                        <ol>
                            <li>2 or 3 days per week (e.g., Sat-Mon-Wed or Sun-Tue-Thu)</li>
                            <li>1 or 2 hours per session</li>
                        </ol>
                        <h4>Course Fee:</h4>
                        <ol>
                            <li>Around <strong>৳ 6,000</strong>(may vary by institution)</li>
                        </ol>
                    </div>
                    <!-- Download button -->
                    <div class="text-center mt-4">
                        <a href="{{ asset('/frontend/assets/file/076-Computer Office Applicaion.pdf') }}" class="btn btn-primary" download>
                                Download File
                        </a>
                        <a href="{{url('/applicant-form')}}" class="btn btn-success" join>Join Course</a>
                    </div>

                    <div class="computer-courses-content mt-5">
                        <h3 class="return-process-form-title">Certificate In Computer Grafics Design And Multimedia Programming</h3>
                        <h4>Duration:</h4>
                        <ol>
                            <li><strong>6 Months </strong>(Typically 360 hours of training)</li>
                        </ol>
                        <h4>Class Schedule:</h4>
                        <ol>
                            <li>2 or 3 days per week (e.g., Sat-Mon-Wed or Sun-Tue-Thu)</li>
                            <li>1 or 2 hours per session</li>
                        </ol>
                        <h4>Course Fee:</h4>
                        <ol>
                            <li>Around <strong>৳ 8,000</strong>(may vary by institution)</li>
                        </ol>
                    </div>
                    <!-- Download button -->
                    <div class="text-center mt-4">
                        <a href="{{ asset('/frontend/assets/file/081 - Graphics Design & Multimedia Programming.pdf') }}" class="btn btn-primary" download>
                                Download File
                        </a>
                        <a href="{{url('/applicant-form')}}" class="btn btn-success" join>Join Course</a>
                    </div>
                </div>
            </div>
    </section>
@endsection
