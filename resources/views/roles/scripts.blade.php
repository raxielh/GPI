@php
    $url=route('dibujar_menu_g');
@endphp
<script>



var tree = [
  {
    text: "Parent 1",
    nodes: [
      {
        text: "Child 1",
        nodes: [
          {
            text: "Grandchild 1"
          },
          {
            text: "Grandchild 2",
						nodes: [
							{
								text: "Grandchild 1"
							},
							{
								text: "Grandchild 2"
							}
						]
          }
        ]
      },
      {
        text: "Child 2"
      }
    ]
  },
  {
    text: "Parent 2"
  },
  {
    text: "Parent 3"
  },
  {
    text: "Parent 4"
  },
  {
    text: "Parent 5"
  }
];




	$(document).ready(function(){ 
			$.ajax({
			type: "GET",  
			url: "{{ $url }}",
			dataType: "json",       
			success: function(response)  
			{
				//initTree(response)
				//console.log(response);
				var treemenu= [{

          id: 1,
					text: "Home",
					node: []

				}];
      console.log(treemenu);

				$.each( response, function( key, v ) {
					$.each( v, function( key, value ) {
						if ( value.id != 1 && value.id_padre == 1 ){
							console.log(value); 
						  treemenu.id[1].node = {	id : value.id,	text : value.descripcion	}
						}
						
					});
				});
				console.log(treemenu);
			}   
		});
	});
	function initTree(treeData) {
		$('#treeview_json').treeview({data: treeData});
	}
</script>