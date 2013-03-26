var connexion;
var collection;

//fonction de callback
function chargement()
{
	if(connexion.readyState == 4)
	{
		collection = eval(connexion.responseText); //chaine de char
		var liste = document.createElement("select");
		liste.setAttribute("onChange", "selection(this)");

		//creation des options pour le select
		document.body.appendChild(liste);
		var item = document.createElement("option");
		item.appendChild(document.createTextNode("choisissez"));
		liste.appendChild(item);
		for(var i = 0; i < collection.length; i++)
		{
			item = document.createElement("option");
			item.appendChild(document.createTextNode(collection[i].nom));
			liste.appendChild(item);
		}
	}
}



function chargementJSON(url)
{
	if(window.XMLHttpRequest)
	{
		connexion = new XMLHttpRequest();
		connexion.open("GET", url, true); //connection asynchrone
		connexion.onreadystatechange = chargement; //appel de la fonction chargement
		connexion.send(null);
	}
}


function selection(liste)
{
	chargementJSON(collection[liste.selectedIndex-1].lien);
}
