<?php
$builder = new Builder($this->name, $this->base);
$content = $builder->buildList($arrayNews);
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
		<script type="text/javascript" src="<?php echo $this->src; ?>jquery-2.1.1.min.js"></script>

		<script type="text/javascript">
			$(function(){
				setInterval("window.location.href = ''", 3000);
			});
		</script>
	</head>
	<body>
		<div class="container">
			<?php echo $content; ?>
		</div>
	</body>
</html>
