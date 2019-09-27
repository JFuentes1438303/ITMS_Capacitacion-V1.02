<?php  
	$documento = $_SESSION['documento'];
	$directorio = "../../cursos/";
	include("conexion.php");

	$sql = "SELECT * FROM archivos WHERE documento = '$documento'";

	if(!$result = $db ->query($sql)){
		die ('Error al buscar los datos [' .$db->error .']');
	}
?>

	<div class="container div2 color2">
		<div class="row b_bottom">
			<div class="col-sm-3 color1">
				<img src="../../files/img/Logo ITMS.png" class="logo2">
			</div>
			<div class="col-sm-9 encabezado3">
				Mis cursos
			</div>
		</div>


<?php
	while ($row = $result -> fetch_array()) {
		$nnombre = stripcslashes($row["nombre_archivo"]);
		$rruta = stripcslashes($row["ruta"]);
		$iid = stripcslashes($row["id_archivo"]);


		echo "<div class='row espacio'>";
			echo "<div class='col-sm-4 t_centro'>";
				echo "ID del archivo $iid";
			echo "</div>";
			echo"<div class='col-sm-4 t_centro'>";
				echo "<a href=\"".$directorio . $rruta."\" target='blanck' class='a_cursos'>".$nnombre."<br></a>";
			echo "</div>";
			echo "<div class='col-sm-4 t_centro'>";
				echo "<a href='eliminar_archivo.php?id=".$row['id_archivo']."' class='btn btn-sm btn-outline-danger'>Eliminar</a>";
			echo "</div>";
		echo "</div>";
	}
		echo "<br>";
?>	
		<div class="row centro">
			<a href="../views/home.php" class="btn btn-sm btn-outline-dark">Volver</a>
		</div>
	<br>
	</div>	

