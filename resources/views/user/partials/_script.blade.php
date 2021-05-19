<script src="{{ asset('userback/js/website/jquery-3.3.1.min.js') }}"></script>
{{-- <script src="{{ asset('userback/js/panel/toastr.min.js') }}"></script> --}}
{{-- <script src="{{ asset('userback/js/panel/jquery-editable-select.min.js') }}"></script> --}}


<script src="{{ asset('userback/js/panel/app.js') }}"></script>
{{-- <script src="{{ asset('userback/js/panel/user.js') }}"></script> --}}
{{-- <script src="{{ asset('userback/js/panel/medium-zoom.js') }}"></script> --}}
<script>
    mediumZoom('.order_img1 img', {
        margin: 24,
        background: '#fff',
        scrollOffset: 0,
        metaClick: false
    })
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{{-- <script>
    window.jQuery || document.write('<script src="userback/js/jquery-1.9.1.min.js"><\/script>')
</script> --}}
<script src="{{ asset('userback/dropify/dropify.min.js') }}"></script>
{{-- <script src="{{ asset('userback/js/jquery-1.9.1.min.js') }}"></script> --}}
<script>
    $.noConflict();
</script>
<script>
    $('document').ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>

        <script>
        $('document').ready(function(){
            $('#datatable').dataTable();
            $("[data-toggle=tooltip]").tooltip();
        });
    </script>

@yield('scripts')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f4801e7cc6a6a5947af6563/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6Q5WMG6QWH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6Q5WMG6QWH');
</script>
