<?php


if(isset($_REQUEST['submit'])){

    $id_tindakan = $_REQUEST['id_tindakan'];

    $sql = mysqli_query($con, "DELETE FROM tindakan WHERE id_tindakan='$id_tindakan'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=tindakan';
	</script>
	<?php
        die();
    }
}
?>

