<!DOCTYPE html>
<html>
<head>
	<title>IMDb.dit</title>
</head>

<body>
  <table width="900" border="0" align="center" cellpadding="0" class="tabla">
    <tr>
      <td colspan="2"><img src="imagenes/logo.jpg" width="900" height="196" /></td>
    </tr>
    <tr>
      <td width="50%" align="right">:: <a href="formbusca.html">Buscar una pel&iacute;cula</a>:: </td>
      <td><a href="forminserta.html">Dar de alta una pel&iacute;cula</a> :: </td>
    </tr>
    <tr>
      <td colspan="2"><p>
        <?php
        include("conecta.php");
        $result = mysql_query("SELECT * FROM pelicula ORDER BY ponderacion", $conexion);
        ?>
          </p>
              <table width="900" border = '1'>
                <tr>
                  <td width="93"><b>Nombre</b></td>
                  <td width="192"><b>URL</b></td>
                  <td width="142"><b>Valoraci&oacute;n</b></td>
                </tr>
                <?php
                while ($row = mysql_fetch_assoc($result)){ 
                ?>
                <tr>
                  <td><?php echo $row['nombre_pelicula']; ?></td>
                  <td><?php echo $row['identificador']; ?></td>
                  <td><?php echo $row['ponderacion']; ?></td>
                </tr>
              </table>
              <?php
              mysql_free_result($result);
              mysql_close();
        ?></td>
    </tr>
</table>
</body>

</html>