<!DOCTYPE html>
<html>
    
    <head>
	
		<title>Авторизация</title>
	
		<meta charset="utf-8">
		
		<link href="//code.ruplex.net/ruplex/versions/v1.1/css/ruplex.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/css/auth.css" />
		
		<script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
		<script src="//code.ruplex.net/ruplex/versions/v1.1/js/ruplex.js" type="text/javascript"></script>
		<script type="text/javascript" src="/js/auth.js"></script>
		
    </head>
    
    <body>
		
		<main>
			<section class="auth_form">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-3 col-md-6">
							<form class="form-horizontal">

								<span class="heading">АВТОРИЗАЦИЯ</span>

								<div class="form-group" style="display: none;" id="error_view">
									<div class="alert-danger">Пользователь с таким логином и паролем не обнаружен!</div>
								</div>
								
								<div class="form-group">

									<input id="auth_login" type="text" class="form-control" placeholder="Введите логин">

									<i class="fa fa-user"></i>

								</div>

								<div class="form-group help">

									<input id="auth_password" type="password" class="form-control" placeholder="Введите пароль">
									<i class="fa fa-lock"></i>

								</div>

								<div class="form-group">

									<button id="auth_submit" type="submit" class="btn btn-default btn-auth">ВХОД</button>

								</div>

							</form>
						</div>
					</div>
				</div>
			</section>
		</main>
		
    </body>
    
</html>