<!--This is a simple application that uses GET request to pull trending coins in CoinGecko API.
	Made by: Fourthram Kaimo
-->

<?php

$request_url = 'https://api.coingecko.com/api/v3/search/trending';
$request_ping = 'https://api.coingecko.com/api/v3/ping';

$ping_array = json_decode(file_get_contents($request_ping), true);

$trending_json = file_get_contents($request_url);
$trending_array = json_decode($trending_json, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="">
		<?php 
			echo 'CoinGecko API ' . $ping_array['gecko_says'] . '<br>';
			echo 'Top-7 trending coins on CoinGecko as searched by users in the last 24 hours (Ordered by most popular first)' . '<br>';
			foreach($trending_array['coins'] as $trending_list) {
				echo '<br>' . '<img src="'.$trending_list['item']['thumb'].'" alt="">';
				echo  $trending_list['item']['name'];
				echo '<br>' . 'Market Cap Rank: ' . $trending_list['item']['market_cap_rank'] . '<br>';
			}
		?>
	</form>
</body>
</html>