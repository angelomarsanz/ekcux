$(document).ready(function()
{
    console.log('jquery14');
    $("#aceptar-fondeos").click(function()
    {
        if ($("#aceptar-retiros").hasClass('active') == true)
        {
            $("#aceptar-retiros").removeClass('active');
        }
        if ($("#retiros").hasClass('nover') == false)
        {
            $("#retiros").addClass('nover');
        }

        if ($("#aceptar-fondeos").hasClass('active') == false)
        {
            $("#aceptar-fondeos").addClass('active');
        }
        if ($("#fondeos").hasClass('nover') == true)
        {
            $("#fondeos").removeClass('nover');
        }
    });

    $("#aceptar-retiros").click(function()
    {
        if ($("#aceptar-fondeos").hasClass('active') == true)
        {
            $("#aceptar-fondeos").removeClass('active');
        }
        if ($("#fondeos").hasClass('nover') == false)
        {
            $("#fondeos").addClass('nover');
        }

        if ($("#aceptar-retiros").hasClass('active') == false)
        {
            $("#aceptar-retiros").addClass('active');
        }
        if ($("#retiros").hasClass('nover') == true)
        {
            $("#retiros").removeClass('nover');
        }
    });
    $('#notification-icon').click(function()
    {
        $("#notification-count").html('');   
        $("#notification-latest").removeClass('nover');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
        }
    }); 
    $('#cerrar-notificacion').click(function()
    {
        $("#notification-latest").addClass('nover');
        $.ajax(
        {
            url:'buscarNotificaciones',
            data:{'name':"luis"},
            type:'post',
            success: function (response) 
            {
                alert(response);
            },
            statusCode: 
            {
                404: function() 
                {
                    alert('web not found');
                }
            },
            error:function(x,xs,xt)
            {
                //nos dara el error si es que hay alguno
                window.open(JSON.stringify(x));
                //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
        });
    });
});