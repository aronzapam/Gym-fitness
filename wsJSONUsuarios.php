<?PHP
$hostname_localhost="localhost";
$database_localhost="gimnasiodb";
$username_localhost="usuario";
$password_localhost="root";

$json=array();
 if(isset($_GET["usuario"]) && isset($_GET["nombre"]) && isset($_GET["paterno"]) && isset($_GET["materno"]) && isset($_GET["contrasena"]) && isset($_GET["fecha"]) && isset($_GET["edad"]) && isset($_GET["genero"]) && isset($_GET["correo"]) && isset($_GET["administrador"])){
  $usuario=$_GET['usuario'];
  $nombre=$_GET['nombre'];
  $paterno=$_GET['paterno'];
  $materno=$_GET['materno'];
  $contrasena=$_GET['contrasena'];
  $fecha=$_GET['fecha'];
  $edad=$_GET['edad'];
  $genero=$_GET['genero'];
  $correo=$_GET['correo'];
  $administrador=$_GET['administrador'];

  $conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

  $insert="INSERT INTO datosusuarios(usuario, nombre, paterno, materno, contrasena, fecha, edad, genero, correo, administrador) VALUES ('{$usuario}','{$nombre}','{$paterno}','{$materno}','{$contrasena}','{$fecha}','{$edad}','{$genero}','{$correo}','{$administrador}')";
  
  if($conexion->query($insert)===TRUE){
   
   $resultado = $conexion->query("SELECT * FROM datosusuarios WHERE usuario = '{$usuario}'");
   //$resultado=mysqli_query($conexion, $consulta);
  
   if($registro=mysqli_fetch_array($resultado)){
    $json['datosusuarios'][]=$registro;
   }
   mysqli_close($conexion);
   echo json_encode($json);
   
  }else{
   $resulta["usuario"]="NO registra";
   $resulta["nombre"]="NO registra";
   $resulta["paterno"]="NO registra";
   $resulta["materno"]="NO registra";
   $resulta["contrasena"]="NO registra";
   $resulta["fecha"]="NO registra";
   $resulta["edad"]=0;
   $resulta["genero"]="NO registra";
   $resulta["correo"]="NO registra";
   $resulta["administrador"]=0;
   $json['datosusuarios'][]=$resulta;
   echo json_encode($json);
  }
 }else{
   $resulta["usuario"]="NO retorna";
   $resulta["nombre"]="NO retorna";
   $resulta["paterno"]="NO retorna";
   $resulta["materno"]="NO retorna";
   $resulta["contrasena"]="NO retorna";
   $resulta["fecha"]="NO retorna";
   $resulta["edad"]=0;
   $resulta["genero"]="NO retorna";
   $resulta["correo"]="NO retorna";
   $resulta["administrador"]=0;
   $json['datosusuarios'][]=$resulta;
   echo json_encode($json);
 }
?>