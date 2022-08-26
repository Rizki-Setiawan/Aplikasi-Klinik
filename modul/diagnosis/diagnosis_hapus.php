<?php


if(isset($_REQUEST['submit'])){

    $id_diagnosis = $_REQUEST['id_diagnosis'];

    $sql = mysqli_query($con, "DELETE FROM diagnosis WHERE id_diagnosis='$id_diagnosis'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=diagnosis';
	</script>
	<?php
        die();
    }
}
?>

