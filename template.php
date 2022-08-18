<!DOCTYPE html>
<html lang="DE">
	<head>
		<title><?php echo $title ;?></title>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="css/styles.css">
		<link href="//db.onlinewebfonts.com/c/1272283b8b654a26e7922c5546dd170a?family=Baveuse" rel="stylesheet" type="text/css">
	</head>
	
	<body>

		<div id="wrap">
		
			<header>
				<?php echo $header; ?>
			</header>

			<div id="sidebar">
				<div id="navigation">
				
				
					
						<?php echo $nav; ?>
					
				</div>
				
				
					
						
					
					
				
				
				
					
				<div id="ausgabe">
					<?php echo $ausgabe ;?>
				</div>

			</div>

			<footer>
				<?php echo $footer ;?>
			</footer>
		</div>
		

		<script> <?php echo $jss; ?></script>

	</body>
</html>