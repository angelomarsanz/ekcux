var fecha_hora = new Date();

$(document).ready(function()
{
    $("#lista-fondeos").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        window.location.replace(url_base+'fondeos');
    });

    $("#lista-retiros").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        window.location.replace(url_base+'retiros');
    });

    $("#lista-fondeos-aceptados").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        window.location.replace(url_base+'fondeos-aceptados');
    });

    $("#lista-retiros-aceptados").click(function()
    {
        var url_base = $('#url-base').data('url-base');
        window.location.replace(url_base+'retiros-aceptados');
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

        //if ( $("#url-total").length == 0 ) 
        //{
            $.ajax(
            {
                url: 'actualizarNotificaciones',
                data:null,
                type:'get',
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
                    },
                    405: function() 
                    {
                        alert('No autorizado');
                    }
                },
                error:function(x,xs,xt)
                {
                    //nos dara el error si es que hay alguno
                    window.open(JSON.stringify(x));
                    //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
            });
        //}
    });
});