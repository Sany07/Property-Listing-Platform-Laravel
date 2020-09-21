@if(Session::has('message'))
<script src="{{ asset('assets/js/toastr.js' ) }}"></script>
<script>
    (function($) {

    var type = "{{ Session::get('alert-type', 'info') }}";
        console.log(type);
      switch(type){
          case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
          case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
  
          case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
  
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
   
})(jQuery);
</script>
@endif