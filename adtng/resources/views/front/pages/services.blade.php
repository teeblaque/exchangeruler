@extends('welcome')

@section('contents')
    <!-- Hero Start -->
        <section class="bg-half d-table w-100" style="background: url('images/company/aboutus.jpg');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level title-heading">
                            <h1 class="text-white title-dark"> Services </h1>
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

        <section class="section bg-light">

            <div class="container">
                <div class="row align-items-end mb-4 pb-4">
                    <div class="col-md-8">
                        <div class="section-title text-center text-md-left">
                            <h6 class="text-warning">Services</h6>
                            <h4 class="title mb-4">What we do ?</h4>
                            <p class="text-muted mb-0 para-desc">Start working with Adt MultiConcept that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->

                <div class="row">
                    <div class="col-md-4 mt-4 pt-2">
                        <ul class="nav nav-pills nav-justified flex-column bg-white rounded shadow p-3 mb-0 sticky-bar" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link rounded active" id="webdeveloping" data-toggle="pill" href="#developing" role="tab" aria-controls="developing" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h6 class="title font-weight-normal mb-0">TV Cables</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="database" data-toggle="pill" href="#data-analise" role="tab" aria-controls="data-analise" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h6 class="title font-weight-normal mb-0">Bitcoin, Eth, USDT</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                             <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="webdesigning" data-toggle="pill" href="#designing" role="tab" aria-controls="designing" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h6 class="title font-weight-normal mb-0">Ghana Cedis and Rmb/CYN</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li>

                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="webdesigning" data-toggle="pill" href="#designing" role="tab" aria-controls="designing" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h6 class="title font-weight-normal mb-0">China procurement</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li>

                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="server" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h6 class="title font-weight-normal mb-0">Internet Data</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item mt-2">
                                <a class="nav-link rounded" id="webdesigning" data-toggle="pill" href="#designing" role="tab" aria-controls="designing" aria-selected="false">
                                    <div class="text-center pt-1 pb-1">
                                        <h6 class="title font-weight-normal mb-0">Phones</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li>
                            <!--end nav item-->
                        </ul><!--end nav pills-->
                    </div><!--end col-->

                    <div class="col-md-8 col-12 mt-4 pt-2">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade bg-white show active p-4 rounded shadow" id="developing" role="tabpanel" aria-labelledby="webdeveloping">
                                <img src="images/work/7.jpg" class="img-fluid rounded shadow" alt="">
                                <div class="mt-4">
                                    <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                                    <a href="javascript:void(0)" class="text-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade bg-white p-4 rounded shadow" id="data-analise" role="tabpanel" aria-labelledby="database">
                                <img src="images/work/8.jpg" class="img-fluid rounded shadow" alt="">
                                <div class="mt-4">
                                    <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                                    <a href="javascript:void(0)" class="text-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade bg-white p-4 rounded shadow" id="security" role="tabpanel" aria-labelledby="server">
                                <img src="images/work/9.jpg" class="img-fluid rounded shadow" alt="">
                                <div class="mt-4">
                                    <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                                    <a href="javascript:void(0)" class="text-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div><!--end teb pane-->

                            <div class="tab-pane fade bg-white p-4 rounded shadow" id="designing" role="tabpanel" aria-labelledby="webdesigning">
                                <img src="images/work/12.jpg" class="img-fluid rounded shadow" alt="">
                                <div class="mt-4">
                                    <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                                    <a href="javascript:void(0)" class="text-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div><!--end teb pane-->
                        </div><!--end tab content-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

@endsection
