<?php
$builder = new Builder($this->name, $this->base);
$content = $builder->buildNews($news, true);
$content .= $builder->buildTag($arrayTags);
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="<?php echo $this->src; ?>css/styles.css" rel="stylesheet" />
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php echo $content; ?>
		</div>
	</body>
</html>
