<?php

function page_head ($title, $script){
    echo '<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>' . $title . '</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/main.css"/>';

    for ($i = 0; $i < count($script); $i++)
        echo '<script src="js/'. $script[$i] . '"></script>';

    echo '</head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a id="message" class="navbar-brand" href="#" style="display: none">Project name</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <!--login-->
          <form id="form-login" method="post" action="json_login.php" class="navbar-form navbar-right" role="form" style="display: none">
            <div class="form-group">
              <input type="text" placeholder="Nom" class="form-control" name="nom">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
		  <form action="inscription.php" method="post" id="inscription" style="display: none">
			<table>
				<tr>
					<td><label>Username </label></td>
					<td><input type="text" name="username"/></td>
				</tr>
				<tr>
					<td><label>Password </label></td>
					<td><input type="password" name="password"/></td>
				</tr>
				<tr>
					<td><label>E-mail   </label></td>
					<td><input type="email" name="mail"/></td>
				</tr>
				<tr>
					<td><input type="submit" value="Sign In"/></td>
				</tr>
			</table>
		  </form>
		  <a href="javascript:void(0)" onclick="signIn();" id="Sinsrcicre">No account yet ? Sign In here</a>
          <!--logout-->
          <form id="form-logout" method="post" action="json_logout.php" class="navbar-form navbar-right" role="form" style="display: none">
            <button type="submit" class="btn btn-success">Log Out</button>
          </form>
          <!--Search-->


        </div><!--/.navbar-collapse -->

      </div>
    </nav>';
}

function page_head_mobile ($title, $script){
    echo '<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>' . $title . '</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
		<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" tilte="styleJqueryMobile"/>';

    for ($i = 0; $i < count($script); $i++)
        echo '<script src="js/'. $script[$i] . '"></script>';

    echo '</head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a id="message" class="navbar-brand" href="#" style="display: none">Project name</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <!--login-->
          <form id="form-login" method="post" action="json_login.php" class="navbar-form navbar-right" role="form" style="display: none">
            <div class="form-group">
              <input type="text" placeholder="Nom" class="form-control" name="nom">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
		  <form action="inscription.php" method="post" id="inscription" style="display: none">
			<table>
				<tr>
					<td><label for="username">Username</label></td>
					<td><input type="text" name="username" id="username"/></td>
				</tr>
				<tr>
					<td><label for="password">Password</label></td>
					<td><input type="password" name="password" id="password"/></td>
				</tr>
				<tr>
					<td><label for="mail">E-mail</label></td>
					<td><input type="email" name="mail" id="mail"/></td>
				</tr>
				<tr>
					<td><input type="submit" value="Sign In"/></td>
				</tr>
			</table>
		  </form>
		  <a href="javascript:void(0)" onclick="signIn();" id="Sinsrcicre">No account yet ? Sign In here</a>
          <!--logout-->
          <form id="form-logout" method="post" action="json_logout.php" class="navbar-form navbar-right" role="form" style="display: none">
            <button type="submit" class="btn btn-success">Log Out</button>
          </form>
          <!--Search-->


        </div><!--/.navbar-collapse -->

      </div>
    </nav>';
}

function page_foot(){
    echo '
    <footer>
    </footer>
    <script src="js/vendor/jquery-1.11.2.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>';
}

function page_foot_mobile(){
    echo '
    <footer>
    </footer>
    <script src="js/vendor/jquery-1.11.2.min.js"></script>
	<script sre="js/vendor/jquery.mobile-1.4.5.min.js"></script>
    <script src="js/Mmain.js"></script>
</body>
</html>';
}