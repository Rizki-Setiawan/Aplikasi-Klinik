<?php


if(isset($_REQUEST['submit'])){

    $id_rawat_inap = $_REQUEST['id_rawat_inap'];

    $sql = mysqli_query($con, "DELETE FROM rawat_inap WHERE id_rawat_inap='$id_rawat_inap'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=rawat_inap';
	</script>
	<?php
        die();
    }
}
?>

