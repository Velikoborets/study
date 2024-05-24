
<?php

include 'secondEngine/connectDb.php';

$catSlug = $params['catSlug'];
$pageSlug = $params['pageSlug'];

$query = "SELECT pages.title, pages.content 
		FROM pages
	LEFT JOIN
		category ON category.id=pages.category_id
	WHERE
		pages.slug='$pageSlug' AND category.slug='$catSlug'";

$res = mysqli_query($dbConnect, $query) or die(mysqli_error($dbConnect));
$page = mysqli_fetch_assoc($res);

return $page;