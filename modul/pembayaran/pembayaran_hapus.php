<?php


if(isset($_REQUEST['submit'])){

    $id_pembayaran = $_REQUEST['id_pembayaran'];

    $sql = mysqli_query($con, "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=pembayaran';
	</script>
	<?php
        die();
    }
}
?>

