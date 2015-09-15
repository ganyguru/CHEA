<?php
include('database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$con=mysqli_connect($host,$user,$pass,$db);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$location=$_POST['location'];
	$aprof=$_POST['aprof'];
	$position=$_POST['position'];
	$pinterest=$_POST['pinterest'];
	$member=$_POST['member'];
	$course=$_POST['course'];
	$phd=$_POST['phd'];
	$bpub=$_POST['bpub'];
	$award=$_POST['award'];
	$project=$_POST['sproj'];
	$train=$_POST['train'];
	$contact=$_POST['contact'];
	$names=explode(" ",$name);
	$lastname=$names[sizeof($names)-1];
	$photo="";
	$ipub="";
	$npub="";
	$ppub="";

	if(!empty($_FILES['photo']['name']))
{
	$target_dir = "profphoto/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$photo=$target_dir.$lastname.".".$FileType;
	move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
	chmod($photo, 0755);
}

if(!empty($_FILES['ipub']['name']))
{
	$target_dir = "pubs/";
	$target_file = $target_dir . basename($_FILES["ipub"]["name"]);
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$ipub=$target_dir.$lastname."_INT.".$FileType;
	move_uploaded_file($_FILES["ipub"]["tmp_name"], $ipub);
	chmod($ipub, 0755);
}

if(!empty($_FILES['npub']['name']))
{

	$target_dir = "pubs/";
	$target_file = $target_dir . basename($_FILES["npub"]["name"]);
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$npub=$target_dir.$lastname."_NAT.".$FileType;
	move_uploaded_file($_FILES["npub"]["tmp_name"], $npub);
	chmod($npub, 0755);
}

if(!empty($_FILES['ppub']['name']))
{
	$target_dir = "pubs/";
	$target_file = $target_dir . basename($_FILES["ppub"]["name"]);
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$ppub=$target_dir.$lastname."_PAP.".$FileType;
	move_uploaded_file($_FILES["ppub"]["tmp_name"], $ppub);
	chmod($ppub, 0755);
}


	mysqli_query($con,"insert into PROF(photo,name,email,phone,location,aprof,position,pinterest,member,course,rstudents,ipub,npub,ppub,bpub,award,proj,train,contact)
	 values ('".$photo."','".$name."','".$email."','".$phone."','".$location."','".$aprof."','".$position."','".$pinterest."','".$member."','".$course."'
	 	,'".$phd."','".$ipub."','".$npub."','".$ppub."','".$bpub."','".$award."','".$project."','".$train."','".$contact."')");

}

?>
<html>
<style>
table,td
{
	border: 1px solid black;
}
</style>
<body>
<h3>*Please Read the rules carefully before filling</h3>
<h2>Rules for filling</h2>
<fieldset>
<ul>
<li> 
only <b>Square</b> size image for profile photo
</li>
<br>
<li> 
In location enter the name of building your room is in<br>
EX:CEESAT (or) Chemical Department roomno:XXX

</li>
<br>
<li> 
Separate your academic qualifications in academic profile by semicolon(";").
<br>EX:. Ph.D. in Chemical Engineering, 1985, Madras University <b>;</b>
M.E. in Chemical Engineering, 1979, IISc Bangalore

</li>

<br>
<li> 
Separate your professional interests by semicolon(";").
<br>EX:. Process Engineering
 <b>;</b>Process Modelling and control


</li>

<br>
<li> 
Separate your membership in professional society by semicolon(";").
<br>EX:. Fellow Member of Indian Institute of Engineers
 <b>;</b>Life Member of Indian Institute of Chemical Engineers


</li>

<br>
<li> 
Separate your courses taught by semicolon(";").
<br>EX:. Environmental Engineering
 <b>;</b>Chemical Engineering Thermodynamics


</li>
<br>

<li> 
Separate your reasearch students by semicolon(";") ([Name]-[Thesis Title]) .
<br>EX:.Ganesh - Developing integrated tools for improved city-scale microgeneration resource appraisal(2014)
 <b>;</b><br>Ramesh - Modelling the solar resource, photovoltaic systems with solar energy technology uptake(2013)


</li>


<br>
<li> 
Upload either <b>.pdf</b> or <b>.doc</b> file for the international,national publications and papers presented .
</li>


<br>

<li> 
Separate your books published by semicolon(";")  .
<br>EX:.Book for Mass Tranfer(EEE publicatons)(2007)
 <b>;</b><br>Book for Heat Tranfer(Arihant publicatons)(2009)
</li>


<br>

<li> 
Separate the awards and honours by semicolon(";")  .
<br>EX:.Received CSIR-SRF fellowship (1996-1998) for Ph.D Program.
 <b>;</b><br>Received BOYSCAST fellowship 2004-2005, from Department of Science and Technology, India.
</li>

<br>
<li> 
Separate the sponsored projects by semicolon(";") and separate name,funding agency,year,financialoutlay by hyphen(-)
<br>[Name of project]-[funding agency]-[year]-[financial outlay]
<br>EX:.Modernization of Unit operations Laboratories-MHRD-2000-Rs.6 Lakhs
 <b>;</b><br>Modernisation of Separations Laboratory-MHRD-2008-Rs.10 Lakhs
</li>
<br>
<li> 
Separate the Reasearch training by semicolon(";")

<br>EX:.Undergone a research training program on Simulated Moving Bed (SMB) Systems at Department of Chemical and Biomolecular Engineering, singapore

 <b>;</b><br>Had a visit to School of Chemical Engineering, Engineering Campus, University Sains Malaysia (USM)
</li>


</ul>
</fieldset>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<center>
<table cellpadding="20">

<tr>
<td>Profile photo</td>
<td><input type="file" name="photo"></td>
</tr>


<tr>
<td>Full Name</td>
<td><input type="text" name="name"></td>
</tr>

<tr>
<td>email</td>
<td><input type="text" name="email"></td>
</tr>

<tr>
<td>phone</td>
<td><input type="text" name="phone"></td>
</tr>


<tr>
<td>location</td>
<td><input type="text" name="location"></td>
</tr>

<tr>
<td style="top:0px;">Academic Profile</td>
<td><textarea name="aprof"></textarea></td>
</tr>


<tr>
<td>Position</td>
<td><select name="position">
	<option value="Professor">Professor</option>
	<option value="Associate Professor">Associate Professor</option>
	<option value="Assistant Professor">Assistant Professor</option>
	
</select></td>

</tr>
<tr>
<td style="top:0px;">Professional Interests</td>
<td><textarea name="pinterest"></textarea></td>
</tr>



<tr>
<td style="top:0px;">Membership in professional Society</td>
<td><textarea name="member"></textarea></td>
</tr>



<tr>
<td style="top:0px;">Courses taught</td>
<td><textarea name="course"></textarea></td>
</tr>




<tr>
<td style="top:0px;">Research Students</td>
<td><textarea name="phd"></textarea></td>
</tr>



<tr>
<td style="top:0px;">International Publications</td>
<td><input type="file" name="ipub"></td>
</tr>




<tr>
<td style="top:0px;">National Publications</td>
<td><input type="file" name="npub"></td>
</tr>



<tr>
<td style="top:0px;">Papers Presented</td>
<td><input type="file" name="ppub"></td>
</tr>

<tr>
<td style="top:0px;">Books published</td>
<td><textarea name="bpub"></textarea></td>
</tr>

<tr>
<td style="top:0px;">Awards and Honours</td>
<td><textarea name="award"></textarea></td>
</tr>


<tr>
<td style="top:0px;">Sponsored projects</td>
<td><textarea name="sproj"></textarea></td>
</tr>


<tr>
<td style="top:0px;">Research Training</td>
<td><textarea name="train"></textarea></td>
</tr>


<tr>
<td style="top:0px;">Contact Address</td>
<td><textarea name="contact"></textarea></td>
</tr>


</table>
<br>
<input type="submit" value="Submit">
</center>
</form>
</body>

</html>