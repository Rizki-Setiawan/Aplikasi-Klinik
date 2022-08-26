<?php


if(isset($_REQUEST['submit'])){

    $id_pemeriksaan = $_REQUEST['id_pemeriksaan'];

    $sql = mysqli_query($con, "DELETE FROM pemeriksaan WHERE id_pemeriksaan='$id_pemeriksaan'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=pemeriksaan';
	</script>
	<?php
        die();
    }
}
?>

