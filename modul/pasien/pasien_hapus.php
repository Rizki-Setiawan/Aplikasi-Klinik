<?php


if(isset($_REQUEST['submit'])){

    $id_pasien = $_REQUEST['id_pasien'];

    $sql = mysqli_query($con, "DELETE FROM pasien WHERE id_pasien='$id_pasien'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=pasien';
	</script>
	<?php
        die();
    }
}
?>

