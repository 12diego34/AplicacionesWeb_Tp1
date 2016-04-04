<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="archivo.css">
  <title>IMDb.dit</title>
</head>

<body>
  <table width="900" border="0" align="center" cellpadding="0" class="tabla">
    <tr>
      <td width="50%" align="right">:: <a href="buscar.html">Buscar una pel&iacute;cula</a>:: </td>
      <td><a href="forminserta.html">Dar de alta una pel&iacute;cula</a> :: </td>
    </tr>
    <tr>
      <td colspan="2"><p>
        <?php
        include("conectarDb.php");
        $result = mysql_query("SELECT * FROM pelicula WHERE ponderacion = 5 ORDER BY ponderacion", $conexion);
        ?>
          </p>
              <table  width="900" border = '1'>
                <tr>
                  <td align="center" width="93"><b>Nombre</b></td>
                  <td align="center" width="192"><b>URL</b></td>
                  <td align="center" width="142"><b>Valoraci&oacute;n</b></td>
                </tr>
                <?php
                while ($row = mysql_fetch_assoc($result)){ 
                ?>
                <tr>
                  <td><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['identificador']; ?></td>
                  <td><?php echo $row['ponderacion']; }?></td>
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
