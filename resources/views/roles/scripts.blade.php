@php
    $url=route('dibujar_menu_g');
@endphp
<script>

	$(document).ready(function(){ 
			$.ajax({
			type: "GET",  
			url: "{{ $url }}",
			dataType: "json",       
			success: function(response)  
			{
				$.each( response, function( key, v ) {
					$.each( v, function( key, v2 ) {
						initTree(v2);
					});
				});
			}   
		});
	});
	//console.log(tree);
	function initTree(treeData) {
		console.log([treeData]);
		$('#treeview_json').treeview(
			{
				data: [treeData],
				levels: 0,
				enableLinks: true,
				highlightSelected: true,
				highlightSearchResults: true,
				showBorder: true,
  			showIcon: true,
				expandIcon: 'glyphicon glyphicon-folder-close',
        collapseIcon: 'glyphicon glyphicon-folder-open',
        emptyIcon: 'glyphicon',

			}
		);
		$('#treeview_json').treeview('expandNode', [ 0, { silent: true, ignoreChildren: false } ]);
		$('#treeview_json').treeview('search', [ 'Parent', {
			ignoreCase: true,     // case insensitive
			exactMatch: false,    // like or equals
			revealResults: true,  // reveal matching nodes
			selectable: false,
		}]);

		$('#treeview_json').on('nodeChecked', function(event, data) {
		console.log(data);
		});




	}
</script>