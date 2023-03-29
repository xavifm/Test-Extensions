<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
		</script>
		<title> Eneagrama </title>
	</head>
	<body style="background-color: #abdbd7">
		<img src="images/logo.png" class="logo">
		<div class="col-12 col-md-12">
			<div class="container mt-5 maincontent">
				<form name="cronotype" id="form" action="" method="post">
					<hr class="d-flex justify-content-center row"/>
					<div class="col-lg-10 testcontent">
						<div class="border">
							<div class="question p-3 border-bottom">
								<div class="d-flex flex-row justify-content-between align-items-center mcq insidetestregion">
									<h4 id="testName"></h4>
									<span>(<label id="indexQuestion"> </label> de <label id="questionsSize"> </label>)</span>
								</div>
							</div>
							<div class="question p-3 border-bottom">
								<div class="d-flex flex-row align-items-center question-title">
									<h5 class="mt-1 ml-2 questionregion">
										<p id="question"> </p>
									</h5>
								</div>
								<div class="ans ml-2">
									<p id="html"> </p>
								</div>
							</div>
						</div>
					</div>
					<?php include 'form.php'; ?>
				</form>
			</div>
		</div>
	</body>
</html>