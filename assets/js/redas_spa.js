var fecha_hora = new Date();

$(document).ready(function()
{
    $("#lista-fondeos").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        var url_total = $('#url-total').data('url-total');
        var page_existe = url_total.indexOf('?page=')
        if (page_existe != -1)
        {
            window.location.replace(url_base+'fondeos');
        }

        if ($("#lista-retiros").hasClass('active') == true)
        {
            $("#lista-retiros").removeClass('active');
        }
        if ($("#retiros").hasClass('nover') == false)
        {
            $("#retiros").addClass('nover');
        }

        if ($("#lista-fondeos-aceptados").hasClass('active') == true)
        {
            $("#lista-fondeos-aceptados").removeClass('active');
        }
        if ($("#fondeos-aceptados").hasClass('nover') == false)
        {
            $("#fondeos-aceptados").addClass('nover');
        }

        if ($("#lista-retiros-aceptados").hasClass('active') == true)
        {
            $("#lista-retiros-aceptados").removeClass('active');
        }
        if ($("#retiros-aceptados").hasClass('nover') == false)
        {
            $("#retiros-aceptados").addClass('nover');
        }

        if ($("#lista-fondeos").hasClass('active') == false)
        {
            $("#lista-fondeos").addClass('active');
        }
        if ($("#fondeos").hasClass('nover') == true)
        {
            $("#fondeos").removeClass('nover');
        }
    });

    $("#lista-retiros").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        var url_total = $('#url-total').data('url-total');
        var page_existe = url_total.indexOf('?page=')
        if (page_existe != -1)
        {
            window.location.replace(url_base+'retiros');
        }

        if ($("#lista-fondeos").hasClass('active') == true)
        {
            $("#lista-fondeos").removeClass('active');
        }
        if ($("#fondeos").hasClass('nover') == false)
        {
            $("#fondeos").addClass('nover');
        }

        if ($("#lista-fondeos-aceptados").hasClass('active') == true)
        {
            $("#lista-fondeos-aceptados").removeClass('active');
        }
        if ($("#fondeos_aceptados").hasClass('nover') == false)
        {
            $("#fondeos_aceptados").addClass('nover');
        }

        if ($("#lista-retiros-aceptados").hasClass('active') == true)
        {
            $("#lista-retiros-aceptados").removeClass('active');
        }
        if ($("#retiros_aceptados").hasClass('nover') == false)
        {
            $("#retiros_aceptados").addClass('nover');
        }

        if ($("#lista-retiros").hasClass('active') == false)
        {
            $("#lista-retiros").addClass('active');
        }
        if ($("#retiros").hasClass('nover') == true)
        {
            $("#retiros").removeClass('nover');
        }
    });

    $("#lista-fondeos-aceptados").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        var url_total = $('#url-total').data('url-total');
        var page_existe = url_total.indexOf('?page=')
        if (page_existe != -1)
        {
            window.location.replace(url_base+'fondeos-aceptados');
        }

        if ($("#lista-fondeos").hasClass('active') == true)
        {
            $("#lista-fondeos").removeClass('active');
        }
        if ($("#fondeos").hasClass('nover') == false)
        {
            $("#fondeos").addClass('nover');
        }

        if ($("#lista-retiros").hasClass('active') == true)
        {
            $("#lista-retiros").removeClass('active');
        }
        if ($("#retiros").hasClass('nover') == false)
        {
            $("#retiros").addClass('nover');
        }

        if ($("#lista-retiros-aceptados").hasClass('active') == true)
        {
            $("#lista-retiros-aceptados").removeClass('active');
        }
        if ($("#retiros-aceptados").hasClass('nover') == false)
        {
            $("#retiros-aceptados").addClass('nover');
        }

        if ($("#lista-fondeos-aceptados").hasClass('active') == false)
        {
            $("#lista-fondeos-aceptados").addClass('active');
        }
        if ($("#fondeos-aceptados").hasClass('nover') == true)
        {
            $("#fondeos-aceptados").removeClass('nover');
        }
    });

    $("#lista-retiros-aceptados").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        var url_total = $('#url-total').data('url-total');
        var page_existe = url_total.indexOf('?page=')
        if (page_existe != -1)
        {
            window.location.replace(url_base+'retiros-aceptados');
        }

        if ($("#lista-fondeos").hasClass('active') == true)
        {
            $("#lista-fondeos").removeClass('active');
        }
        if ($("#fondeos").hasClass('nover') == false)
        {
            $("#fondeos").addClass('nover');
        }

        if ($("#lista-retiros").hasClass('active') == true)
        {
            $("#lista-retiros").removeClass('active');
        }
        if ($("#retiros").hasClass('nover') == false)
        {
            $("#retiros").addClass('nover');
        }

        if ($("#lista-fondeos-aceptados").hasClass('active') == true)
        {
            $("#lista-fondeos-aceptados").removeClass('active');
        }
        if ($("#fondeos-aceptados").hasClass('nover') == false)
        {
            $("#fondeos-aceptados").addClass('nover');
        }

        if ($("#lista-retiros-aceptados").hasClass('active') == false)
        {
            $("#lista-retiros-aceptados").addClass('active');
        }
        if ($("#retiros-aceptados").hasClass('nover') == true)
        {
            $("#retiros-aceptados").removeClass('nover');
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
            url:'actualizarNotificaciones',
            data:{'estatus_notificaciones':"Leídas"},
            type:'post',
            success: function (response) 
            {
                vectorNotificaciones = JSON.parse(response);
                if (vectorNotificaciones.contador > 0)
                {
                    $('#notification-count').html(vectorNotificaciones.contador);
                }
                $('#lista-notificaciones').html(vectorNotificaciones.notificaciones);
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

    if ( $("#fondeos").length > 0 ) 
    {
        var url_base = $('#url-base').data('url-base');
        $("#fondeos a").each(function (index) 
        {
            var url_paginacion = $(this).attr('href');
            var posicion_page = url_paginacion.indexOf('?page=');
            if (posicion_page != -1)
            {
                var pagina_numero = url_paginacion.substring(posicion_page);          
                $(this).attr('href', url_base+'fondeos/'+pagina_numero);
            }
        });
    }

    if ( $("#retiros").length > 0 ) 
    {
        var url_base = $('#url-base').data('url-base');
        $("#retiros a").each(function (index) 
        {
            var url_paginacion = $(this).attr('href');
            var posicion_page = url_paginacion.indexOf('?page=');
            if (posicion_page != -1)
            {
                var pagina_numero = url_paginacion.substring(posicion_page);          
                $(this).attr('href', url_base+'retiros/'+pagina_numero);
            }
        });
    }

    if ( $("#fondeos-aceptados").length > 0 ) 
    {
        var url_base = $('#url-base').data('url-base');
        $("#fondeos-aceptados a").each(function (index) 
        {
            var url_paginacion = $(this).attr('href')
            var posicion_page = url_paginacion.indexOf('?page=')
            if (posicion_page != -1)
            {
                var pagina_numero = url_paginacion.substring(posicion_page);          
                $(this).attr('href', url_base+'fondeos-aceptados/'+pagina_numero);
            }
        });
    }

    if ( $("#retiros-aceptados").length > 0 ) 
    {
        var url_base = $('#url-base').data('url-base');
        $("#retiros-aceptados a").each(function (index) 
        {
            var url_paginacion = $(this).attr('href')
            var posicion_page = url_paginacion.indexOf('?page=')
            if (posicion_page != -1)
            {
                var pagina_numero = url_paginacion.substring(posicion_page);          
                $(this).attr('href', url_base+'retiros-aceptados/'+pagina_numero);
            }
        });
    }
});