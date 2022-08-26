<?php


if(isset($_REQUEST['submit'])){

    $id_petugas = $_REQUEST['id_petugas'];

    $sql = mysqli_query($con, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=petugas';
	</script>
	<?php
        die();
    }
}
?>

