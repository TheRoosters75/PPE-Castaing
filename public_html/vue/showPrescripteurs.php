<?php
	echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"test.php?action=addnew\">Ajout nouveau prescripteur</a><br/><br/>");
	echo("<ul data-role=\"listview\" data-filter-placeholder=\"true\">"); 
	foreach($contacts as $info){
                echo("<li>");
		echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"test.php?action=details&id=".$info->getId()."\">");
		echo("".$info->getNom()."<br/>");
		
		echo("</a>");		
		echo("</li>\n");
	}
	echo("</ul>");
?>