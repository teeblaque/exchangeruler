function submitAjax(btn,btnval,datas,url,redir,msg){$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});btn.addClass('is-loading');btn.html('<i class="fa fa-circle-o-notch fa-spin"></i> Processing');$.ajax({url:url,type:"POST",data:datas,contentType:false,cache:false,processData:false,success:function(data){if(data.success){toastr.options.positionClass='toast-bottom-right';toastr.success(data.message,'Success !');btn.removeClass('is-loading');btn.html(btnval);setTimeout(function(){if(redir!=''){location.href=redir;}
else{location.reload()}},3000);}else{toastr.options.positionClass='toast-bottom-right';toastr.error(data.message,'Error !');btn.removeClass('is-loading');btn.html(btnval);}},error:function(data){var response=JSON.parse(data.responseText);printErrorMsg(response.errors);toastr.options.positionClass='toast-bottom-right';toastr.error(response.message,'Error !');btn.removeClass('is-loading').html(btnval);}});}
$("#loginAction").on('submit',(function(e){e.preventDefault();var datas=new FormData(this);submitAjax($("#loginBtn"),"Login",datas,'/login/doLogin',"",$("#msg"));}));$("#RegisterForm").on('submit',(function(e){e.preventDefault();var datas=new FormData(this);submitAjax($("#btn-RegisterForm"),"Register",datas,'/login/doReg',"",$("#msg"));}));$("#ForgotPassForm").on('submit',(function(e){e.preventDefault();var datas=new FormData(this);submitAjax($("#btn-ForgotPassForm"),"Request",datas,'/login/requestToken',"/login",$("#msg"));}));$("#changePassForm").on('submit',(function(e){e.preventDefault();var datas=new FormData(this);submitAjax($("#btn-changePassForm"),"Change",datas,'/login/changePassPost',"/login",$("#msg"));}));