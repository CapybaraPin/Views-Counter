<?php 

function get_view($page_name)
{
	
	$bdd = new PDO('mysql:host=localhost;dbname=admin_views;charset=utf8', 'views', 'T~xal386');
	
    $vues = $bdd->query('SELECT * FROM views WHERE page_name = "'. $page_name .'"');
	
	while($v = $vues->fetch()) {
		$nb_vue = $v['views'];
	}
	
	$vues_add = $nb_vue +1;
	
	$update = $bdd->prepare('UPDATE views SET views = ? WHERE page_name = "'. $page_name .'"');
	$update->execute(array($vues_add));
	
}

?>