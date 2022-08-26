<?php


if(isset($_REQUEST['submit'])){

    $id_lab = $_REQUEST['id_lab'];

    $sql = mysqli_query($con, "DELETE FROM lab WHERE id_lab='$id_lab'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=lab';
	</script>
	<?php
        die();
    }
}
?>

