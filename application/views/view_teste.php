<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >

	<title></title>
</head>
<body>

<div class="container">

	<?php if (isset($autor)) {?>
		<h4>Autor: <?=$autor->nome?></h4>
	<?php } ?>

<table class="table mt-4">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Titulo</th>
		<th scope="col">Artigo</th>
	</tr>
	</thead>
	<tbody>

	<?php if (isset($artigos)) {?>

		<?php foreach ($artigos as $artigo) {?>

			<tr>
				<td>
					<?=$artigo->id?>
				</td>

				<td>
					<?=$artigo->titulo?>
				</td>

				<td style="width:85%">
					<?=$artigo->artigo?>
				</td>
			</tr>

			<?php }?>

		<?php }?>
	</tbody>
</table>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>
