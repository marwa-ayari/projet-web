<?PHP
session_start() ;
$con = mysqli_connect('localhost','root','') ;
mysqli_select_db($con,'dar') ;
       $nom =$_POST['nom'];
		$date =$_POST['date'];
		$time=$_POST['time'] ;
		$email =$_POST['email'];
		$pers=$_POST['pers'];
		$tel=$_POST['tel'] ;
		$s = "select * from reservation where nom='$nom'" ;
	$resultat = mysqli_query($con,$s) ;
	$num = mysqli_num_rows($resultat) ;
if($num == 1){
	header('location:index.php') ;
}
	else
	{
		$reg="insert into reservation (nom,date,time,email,pers,tel) values('$nom','$date','$time','$email','$pers','$tel')";
		mysqli_query($con,$reg) ;
		header('location:index.php') ;
	}
         
	



?>