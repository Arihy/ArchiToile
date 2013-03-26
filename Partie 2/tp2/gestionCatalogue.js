$().ready(function() {
	//charger le fichier chanteurs.json
	function chargerChanteur()
	{
		$.getJSON('chanteurs.json', function(data)
		{
			$.each(data, function(key, val){
				var tmp = "albums_"+val['nom'];
				var html = "<li id="+tmp+">"+val['nom']+"<img id="+val['nom']+" src="+val['image']+" /></li>";
				
				$("#catalogue").append(html);
			})
			$("img").click(function() {
			var id = $(this).attr("id");
			var html2 = "<ul > </ul>";
			var fichier = "albums_"+id;
			var idTmp = "."+fichier;
			$("."+fichier).append(html2);
			var idListe = id;
  		$(idListe).empty();
    	$.getJSON(fichier+'.json', function(data) {
    		$.each(data, function(entryIndex, entry) {
    			var html = "<li>"+entry['nom']+"</li>";
    			var liste = id;
        	$(liste).append(html);
      	});
			});
  	}
  	);
	});
	}

	chargerChanteur();
	
	
});
