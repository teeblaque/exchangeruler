@extends('welcome')

@section('contents')
    <!-- Hero Start -->
        <section class="bg-half d-table w-100" style="background: url('images/company/aboutus.jpg');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level title-heading">
                            <h1 class="text-white title-dark"> About us </h1>
                            <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Adt MultiConcept that can provide everything you need to generate awareness, drive traffic, connect.</p>

                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->

        <section class="section">
            <div class="container">
                <div class="row align-items-center" id="counter">
                    <div class="col-md-6">
                        <img src="images/company/newabt.jpg" class="img-fluid" alt="">
                    </div><!--end col-->

                    <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="ml-lg-4">
                            {{-- <div class="d-flex mb-4">
                                <span class="text-primary h1 mb-0"><span class="counter-value display-1 font-weight-bold" data-count="15">0</span>+</span>
                                <span class="h6 align-self-end ml-2">Years <br> Experience</span>
                            </div> --}}
                            <div class="section-title">
                                <h4 class="title mb-4">Who we are ?</h4>
                                <p class="text-muted">ADTSERVERHQ is a company that deals in Crytpocurrency trading, sale of airtime & data, and sale of phones,gadgets and console, the company boasts of customers all over Nigeria and beyond. <br/>
                            <br/>ADTSERVERHQ was founded to create a safe and trusted platform where transactions and sales can be made.
                            </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-6 text-center pt-4">
                        <img src="images/client/amazon.svg" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 text-center pt-4">
                        <img src="images/client/google.svg" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 text-center pt-4">
                        <img src="images/client/lenovo.svg" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 text-center pt-4">
                        <img src="images/client/paypal.svg" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 text-center pt-4">
                        <img src="images/client/shopify.svg" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 text-center pt-4">
                        <img src="images/client/spotify.svg" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <section class="section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h6 class="text-warning">Work Process</h6>
                            <h4 class="title mb-4">How do we works ?</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Start working with Adt MultiConcept that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="card features work-process bg-transparent process-arrow border-0 text-center">
                            <div class="icons rounded h1 text-center text-primary px-3">
                                <i class="uil uil-presentation-edit"></i>
                            </div>

                            <div class="card-body">
                                <h4 class="title text-dark">Sign up</h4>
                                <p class="text-muted mb-0">Register with a suitable email and password to start</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-md-5 pt-md-3 mt-4 pt-2">
                        <div class="card features work-process bg-transparent process-arrow border-0 text-center">
                            <div class="icons rounded h1 text-center text-primary px-3">
                                <i class="uil uil-airplay"></i>
                            </div>

                            <div class="card-body">
                                <h4 class="title text-dark">Fund Wallet</h4>
                                <p class="text-muted mb-0">Fund your wallet to pay bills such as Internet subscription, Electricity bills</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-md-5 pt-md-5 mt-4 pt-2">
                        <div class="card features work-process bg-transparent d-none-arrow border-0 text-center">
                            <div class="icons rounded h1 text-center text-primary px-3">
                                <i class="uil uil-image-check"></i>
                            </div>

                            <div class="card-body">
                                <h4 class="title text-dark">Start Transacting</h4>
                                <p class="text-muted mb-0">You can start </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

        </section><!--end section-->


@endsection
