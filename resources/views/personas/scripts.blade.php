<script>
    $('.table').hide();
    CargarDatos();
    function Usuario(i)
    {
        $('#personas_id').val(i);
        $('#CrearUsuario').modal('show');
    }
    function qr(i)
    {
        $('#myModal').modal('show');
        $( "#qr" ).empty();
        $('#qr').qrcode({
            render:'image',
            width:150,
            height:150,
            text:i,
        });
    }

</script>
