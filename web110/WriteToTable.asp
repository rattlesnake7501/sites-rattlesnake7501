<% Language=VBScript %>

<html>
	<head>
		<title>Write the data to a table</title>
		<link rel="stylesheet" href="w3.css" />
		<link rel="stylesheet" href="styles.css" />
	</head>
	
	<body class="bcol">
		<%
			'Maks a connection to the database on the server
			set con=Server.createobject("ADODB.connection")
			con.open "db110"
		
			'Makes a connection to the table on the database
			set rs1=server.createobject("ADODB.recordset")
			rs1.open "Names", con, 1, 3
		
			'call sub routines below
			writeodb()
			cloasedb()
		
		%>
		
	<div class="w3-row hcol">
		<div class="w3-col s12 w3-image ">
			<a href="index.html"><img src="logo.png" alt="logo"></a>
		</div>
	</div>
	<nav class="hcol">
		<div class="w3-row hcol">
			<div class="right w3-col s12 w3-image">
				<a class="button" href="index.html">Home</a>
				<a class="button" href="map.html">Interactive map</a>
				<a class="button" href="aus.html">About Us</a>
				<a class="button" href="cus.html">Contact Us</a>
			</div>
		</div>
	</nav>
<div class="w3-row hcol">
			<div id="height" class="w3-col s2 w3-image">
						<a class="button" href="cs.html">Computer Science</a><br>
						<a class="button" href="hab.html">Hair and Beauty</a><br>
						<a class="button" href="bait.html">Buisness and IT</a><br>
						<a class="button" href="Avi.html">Avaiation</a><br>
						<a class="button" href="Eng.html">Engineering</a>
				</center>	
			</div>
			<div id="height" class="w3-col s10 w3-image bcol">
					<h4><p><center>Your details have been written to the table in the database</center></p></h4>
					<br>
					<br>
					<br>
				</center>
			</div>	
		
		<%
			'add records to the table
			sub writeodb()
				rs1.addnew
				rs1.fields("Firstname")=request.form("strFirstname")
				rs1.fields("Surname")=request.form("strSurname")
				rs1.fields("Age")=request.form("strAge")
				rs1.fields("Gender")=request.form("strGender")
				rs1.fields("Email")=request.form("strEmail")
				rs1.fields("Student")=request.form("strStudent")
				rs1.fields("Message")=request.form("strMessage")
				rs1.update
			end sub
			
			'This will close the record set and the database connections
			sub cloasedb()
				rs1.close
				con.close
			end sub
			
		
		%>
		
	</body>
</html>