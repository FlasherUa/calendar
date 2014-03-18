<?php
if (adminIn===true) {?>
<nav
	class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
<div class="container" id="main">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<!-- a class="navbar-brand" href="index.php">Home page</a-->
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav" id='bottomMenu'>

			<li id='searchC'><input type="text" class="btn address1"
				name="address" />
				<button class="btn" onClick='app.geocode(1)'>
					<span class='glyphicon glyphicon-search'></span>
				</button></li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>

<!-- /.container --> </nav>
<?php  }
?>
<div id="map"></div>