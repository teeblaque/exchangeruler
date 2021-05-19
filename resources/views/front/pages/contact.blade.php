@extends('front.welcome')

@section('contents')
    <section class="contact" style="padding: 0 0;">
      {{-- <section class="landing d-flex mt-0">
        <div class="container d-flex">
          <div class="row  d-flex mt-5 justify-content-center  text-center text-md-left ">
            <div class="col-12   d-flex flex-column justify-content-center">
              <h1 class="text-center" style="line-height: 150%;">Give us your feedbacks</h1>
            </div>
          </div>
        </div>
      </section> --}}
      <div class="container">
        <div class="row" style="margin-top: 100px;">
          <div class="col-12 col-lg-6  mr-5 mb-5 p-5 contact-form bg-white">
            <div class="header d-flex "><img
                src="https://res.cloudinary.com/chiji14exchange/image/upload/v1575127057/gallery/semd_message.svg"
                alt="message-icon" class="mr-5">
              <h3 class="text-center">Send us a message or Request a call</h3>
            </div>
            <form action="{{ route('contact') }}" method="POST">
                @csrf
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label>Full Name</label><input required="" name="name" id="name" class="ant-input error"
                      placeholder="Enter your name" type="text" value="">
                    <div class="mb-2"></div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label>Email address</label><input required="" name="email" id="email"
                      class="ant-input error" placeholder="Enter your email address" type="email" value="">
                    <div></div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label>Phone </label>
                    <div class="react-tel-input"><input class=" form-control" id="phone-form-control"
                        style="width: 100%;" placeholder="+1 (702) 123-4567" type="tel" name="mobile" id="mobile" required="">
                      <div class=" flag-dropdown" id="flag-dropdown" tabindex="0" role="button">
                        <div class="selected-flag" title="Nigeria: + 234">
                          <div class="flag ng">
                            <div class="arrow"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div></div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group"><label>Message</label><textarea required="" name="contents" id="contents" rows="7"
                      class="ant-input error" placeholder="Type your message"></textarea>
                    <div></div>
                  </div>
                </div>
              </div>
              <div class="form-group d-flex flex-column justify-content-center">
                  <button type="submit" class="ant-btn btn-primary m-auto" id="submit_mail"><span>Submit</span></button>
                </div>
            </form>
          </div>
          <div
            class=" contact-details col-12 col-lg-5  d-flex flex-column align-items-center align-items-lg-start  justify-content-center">
            <div class="mb-2"><i class="fa fa-envelope" style="color: #1890ff;font-size: 20px"></i><span><a rel="noopener noreferrer" class="ml-2" target="_blank"
                  href="mailto:support@exchangeruler.com">support@exchangeruler.com</a></span></div>
            <div class="mb-2 d-flex align-items-start py-2"><i class="fa fa-phone" style="color: #1890ff;font-size: 20px"></i><span><a href="tel:+2348180682860">+2348180682860</a></span></div>
            <div class="mb-2 d-flex align-items-start py-2"><span><i class="fa fa-map" style="color: #1890ff;font-size: 20px"></i><span> Nigeria </span> </span></div>
            <div class="mt-5"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1013525.6601196526!2d3.089474332847406!3d7.116193437286728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b0deeeb1087cb%3A0xae67d82f51409ce8!2sOgun%20State!5e0!3m2!1sen!2sng!4v1594758298951!5m2!1sen!2sng" width="416" height="329" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('document').ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

         function isEmpty(value){
            return (value == null || value.length === 0);
        }

        $('#submit_mail').click(function(e){
            e.preventDefault();

            var email = $("#email").val();
            var name = $("#name").val();
            var mobile = $("#mobile").val();
            var contents = $("#contents").val();

            if (isEmpty(email) || isEmpty(name) || isEmpty(mobile) || isEmpty(contents)) {
                alert('All fields are required');
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{ route('contact') }}",
                    data: {email: email, name: name, mobile: mobile, contents: contents}

                }).done(function(data){
                    console.log(data);
                    alert(data);
                    window.location.reload();

                }).fail(function(data){
                    console.log(data);
                });
            }
        });
        });
    </script>
@endsection

