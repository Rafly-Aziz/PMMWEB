<!DOCTYPE html>
<html>
<head>
	<title>Aziz141 Calculator</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/Kalkulator.css">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet"> 

	<!-- Script -->
	<script src="js/Kalkulator2.js"></script>
</head>

<body>
	<div class="bg"></div>
		<div class="main">
			<h2>Calculator</h2>
			<form name="form">
				<input class="textarea" name="textarea">
			</form>
				<table>
					<tr>
						<td><input class="button" type="button" value="C" onclick="clean()"></td>
						<td><input class="button" type="button" value="<" onclick="back()"></td>
						<td><input class="button btn-blue" type="button" value="/" onclick="insert(' / ')"></td>
						<td><input class="button btn-blue" type="button" value="x" onclick="insert(' * ')"></td>
					</tr>
					<tr>
						<td><input class="button" type="button" value="7" onclick="insert(7)"></td>
						<td><input class="button" type="button" value="8" onclick="insert(8)"></td>
						<td><input class="button" type="button" value="9" onclick="insert(9)"></td>
						<td><input class="button btn-blue" type="button" value="-" onclick="insert(' - ')"></td>
					</tr>
					<tr>
						<td><input class="button" type="button" value="4" onclick="insert(4)"></td>
						<td><input class="button" type="button" value="5" onclick="insert(5)"></td>
						<td><input class="button" type="button" value="6" onclick="insert(6)"></td>
						<td><input class="button btn-blue" type="button" value="+" onclick="insert(' + ')"></td>
					</tr>
					<tr>
						<td><input class="button" type="button" value="1" onclick="insert(1)"></td>
						<td><input class="button" type="button" value="2" onclick="insert(2)"></td>
						<td><input class="button" type="button" value="3" onclick="insert(3)"></td>
						<td rowspan=2><input style="height:106px;" class="button btn-blue" type="button" value="=" onclick="equal()"></td>
					</tr>
					<tr>
						<td><input class="button" type="button" value="0" onclick="insert(0)"></td>
						<td><input class="button" type="button" value="00" onclick="insert('00')"></td>
						<td><input class="button" type="button" value="." onclick="insert('.')"></td>
					</tr>
				</table>
			
		</div>
	</div>
	
</body>
</html>
