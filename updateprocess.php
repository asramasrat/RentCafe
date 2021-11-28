<?php

if(isset($_POST["submit"]))
{
    if( !empty($_FILES["file1"]["name"])){
        $fileName1 = basename($_FILES["file1"]["name"]);
        // echo $fileName1;
    }
    if( !empty($_FILES["file2"]["name"])){
        $fileName2 = basename($_FILES["file2"]["name"]);
        // echo $fileName2;
    }
    if( !empty($_FILES["file3"]["name"])){
        $fileName3 = basename($_FILES["file3"]["name"]);
        // echo $fileName3;
    }
    if( !empty($_FILES["file4"]["name"])){
        $fileName4 = basename($_FILES["file4"]["name"]);
        // echo $fileName4;
    }
    $id=$_POST['id'];
    // die($_GET["id"]);
    $size=$_POST["size"];
    $area=$_POST["area"];
    $price=$_POST["price"];
    $location=$_POST["location"];
    $address=$_POST["address"];
    $description=$_POST["description"];
    $trans=$_POST["trans"];
    $problem=$_POST["problem"];
    $lift=$_POST["lift"];
    $furniture=$_POST["furniture"];
    $aminities="";
    if(isset($_POST['ammentites1'])){
        $aminities .= $_POST['ammentites1'];
        
    }
    if(isset($_POST['ammentites2'])){
        $aminities .= ",";
        $aminities .= $_POST['ammentites2'];	
    }
    if(isset($_POST['ammentites3'])){
        $aminities .= ",";
        $aminities .= $_POST['ammentites3'];
    }
    if(!isset($_POST['ammentites1']) &&!isset($_POST['ammentites2']) && !isset($_POST['ammentites3']))
    {
        $aminities="N/A";
    }
    if(empty($fileName1))
    {
        $fileName1="dummy.jpg";
    }
    if(empty($fileName2))
    {
        $fileName1="dummy.jpg";
    }
    if(empty($fileName3))
    {
        $fileName1="dummy.jpg";
    }
    if(empty($fileName4))
    {
        $fileName1="dummy.jpg";
    }
    $email = $_COOKIE['EMAIL'];
        $server = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "rent_cafe";
        // $id=$_SESSION["pid"];
        echo($id);
        echo ($id.$email.$size.$price.$location.$address.$area.$description.$trans.$problem.$aminities.$furniture.$lift.$fileName1.$fileName2.$fileName3.$fileName4);
        $conn = mysqli_connect($server, $username, $pass, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            
        }
        $upquery="UPDATE properties_details SET email = '".$email."' , size ='".$size."', price =".$price." , small_addr ='".$location."' ,address='".$address."', sqft = ".$area." , descr = '".$description."' , public_trans = '".$trans."' , rec_prob = '".$problem."' , amenities = '".$aminities."' , furnished = '".$furniture."' , lift = '".$lift."' , cover_pic = '".$fileName1."' , pic1 = '".$fileName2."' , pic2 = '".$fileName3."' , pic3 = '".$fileName4."' where pid=".$id;
        // die(var_dump($upquery));
        $uquery=mysqli_query($conn,$upquery);
        header("Location: mylist.php");
}



?>