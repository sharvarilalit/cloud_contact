$(document).ready(function(){
    $('#logText').html('Login');
    $('#logForm').submit(function(e){
        e.preventDefault();
        $('#logText').html('Checking...');
        var url = '<?php echo base_url(); ?>';
        var user = $('#logForm').serialize();
        var login = function(){
            $.ajax({
                type: 'POST',
                url: url + 'LoginController/login',
                dataType: 'json',
                data: user,
                success:function(response){
                    {console.log('response',response)}
                    $('#message').html(response.message);
                    $('#logText').html('Login');
                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                    }
                    else{
                        $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                        $('#logForm')[0].reset();
                        setTimeout(function(){
                            location.reload();
                        }, 3000);
                    }
                }
            });
        };
        setTimeout(login, 3000);
    });

    $(document).on('click', '#clearMsg', function(){
        $('#responseDiv').hide();
    });
});
