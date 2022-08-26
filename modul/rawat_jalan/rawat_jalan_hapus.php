<?php


if(isset($_REQUEST['submit'])){

    $id_rawat_jalan = $_REQUEST['id_rawat_jalan'];

    $sql = mysqli_query($con, "DELETE FROM rawat_jalan WHERE id_rawat_jalan='$id_rawat_jalan'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=rawat_jalan';
	</script>
	<?php
        die();
    }
}
?>

