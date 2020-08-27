$(document).ready(function (){

    $(document).ready(function() {
                $('#infoform').submit(function(e) {
                     $('.response_error').html("");
                    if($('#address').val()=="" || $('#zipcode').val()==""){
                        alert('Please Enter Address and Zip Code.');
                        return false;
                    }
                    e.preventDefault();
                      $(".overlay").show();
                    $('#submit').val('Finding..');
                    $.ajax({
                        type: "POST",
                        url: site_url+'/home/get_info_step_1',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            var jsonData = JSON.parse(response);
                            if (jsonData.success == "1")
                                {
                                    $('#step_2_result').html(jsonData.result);
                                }else{
                                  //  alert('Please Try Again!');
                                      $('.response_error').html(jsonData.result);
                                }
                             $('#submit').val('Submit');
                               $(".overlay").hide();
                       }
                   });
                 });
            });

});