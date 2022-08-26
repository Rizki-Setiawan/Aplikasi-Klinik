<?php


if(isset($_REQUEST['submit'])){

    $id_alkes = $_REQUEST['id_alkes'];

    $sql = mysqli_query($con, "DELETE FROM alkes WHERE id_alkes='$id_alkes'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=alkes';
	</script>
	<?php
        die();
    }
}
?>

