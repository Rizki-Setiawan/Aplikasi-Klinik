<?php


if(isset($_REQUEST['submit'])){

    $id_kamar = $_REQUEST['id_kamar'];

    $sql = mysqli_query($con, "DELETE FROM kamar WHERE id_kamar='$id_kamar'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=kamar';
	</script>
	<?php
        die();
    }
}
?>

