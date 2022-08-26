<?php


if(isset($_REQUEST['submit'])){

    $id_obat = $_REQUEST['id_obat'];

    $sql = mysqli_query($con, "DELETE FROM obat WHERE id_obat='$id_obat'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=obat';
	</script>
	<?php
        die();
    }
}
?>

