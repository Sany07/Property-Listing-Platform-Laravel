function deleteData(route, id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // var CSRF_TOKEN = `{{ csrf_token() }}`;
        // console.log(CSRF_TOKEN);
        $.ajax({
            type: 'POST',
            url: route,
            data : {'_method' : 'DELETE', '_token' : CSRF_TOKEN },
         
            success : function(data) {
                // table1.ajax.reload();
                swal({
                  title: "Delete Done!",
                  text: "You clicked the button!",
                  icon: "success",
                  button: "Done",
                });
                $("#row_"+id).remove();
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    // text: data.message,
                    timer: '1500'
                })
            }
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });
  }