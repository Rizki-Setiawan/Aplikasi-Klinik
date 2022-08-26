<?php


if(isset($_REQUEST['submit'])){

    $id_kunjungan = $_REQUEST['id_kunjungan'];

    $sql = mysqli_query($con, "DELETE FROM kunjungan WHERE id_kunjungan='$id_kunjungan'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=kunjungan';
	</script>
	<?php
        die();
    }
}
?>

