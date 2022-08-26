<?php


if(isset($_REQUEST['submit'])){

    $id_user = $_REQUEST['id_user'];

    $sql = mysqli_query($con, "DELETE FROM login WHERE id_user='$id_user'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=pengguna';
	</script>
	<?php
        die();
    }
}
?>

