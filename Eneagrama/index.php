<html>
	<head>
		<link rel="stylesheet" href="style.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
			<title> Chronotype </title>
		</head>
		<body style="background-color: #abdbd7">
			<img src="images/logo.png" style="padding: 10px">
				<div class="col-12 col-md-12">
					<div class="container mt-5" style="display: flex; justify-content: center">
						<form name="cronotype" id="form" action="" method="post">
							<hr class="d-flex justify-content-center row"/>
							<div class="col-lg-10" style="width: 100%;">
								<div class="border">
									<div class="question p-3 border-bottom">
										<div class="d-flex flex-row justify-content-between align-items-center mcq" style="color: #00aaa0">
											<h4 id="testName"></h4>
											<span>(<label id="indexQuestion"> </label> de <label id="questionsSize"> </label>)</span>
										</div>
									</div>
									<div class="question p-3 border-bottom">
										<div class="d-flex flex-row align-items-center question-title">
											<h5 class="mt-1 ml-2" style="font-size: 20; color: #3D322D; font-weight: bold;">
												<p id="question"> </p>
											</h5>
										</div>
										<div class="ans ml-2">
											<p id="html">
<?php include 'form.php'; ?>
</body>
</html>