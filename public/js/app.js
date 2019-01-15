const Url_App = $('meta[name=url]').attr("content");
$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

$(".change_color").click(function(e){

    let color = e.currentTarget.dataset.theme;

    console.log(color);

    $.ajax(
        {
            type:'POST',
            url: Url_App+"cambiar_tema",
            data:{
                color:color,
            },success:function(data)
            {
                console.log('Bien:',data.success);
            },error: function(jqXHR, status, error) {
                console.log('Error:', error);
        	},complete : function(jqXHR, status) {
                console.log('Petición realizada:',status);
            }
        }
    );


});
