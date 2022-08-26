<?php


if(isset($_REQUEST['submit'])){

    $id_dokter = $_REQUEST['id_dokter'];

    $sql = mysqli_query($con, "DELETE FROM dokter WHERE id_dokter='$id_dokter'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=dokter';
	</script>
	<?php
        die();
    }
}
?>

