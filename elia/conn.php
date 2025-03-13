<?php
// Declarar los header para permitir CORS y JSON
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Origin: *");
header("Accept-Charset: UTF-8");

$host = "localhost:3308"; 
$user = "root";
$password = "";
$dbname = "starrail";

try {
   //Conectar a la base
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   //Mostrar personajes en el htnml
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      // Query para seleccionar la info. del personaje, incluyendo la imagen
      $query = "SELECT id_personaje, nombre, via, elemento, eidolons, rareza, link_trailer, imagen FROM personaje";
      $result = $conn->query($query);
      $data = $result->fetchAll(PDO::FETCH_ASSOC);
  
      if (empty($data)) {
          echo json_encode(["mensaje" => "No se encontraron datos en la tabla."]);
      } else {
          // Codificar la imagen en Base64 para incluirla en la respuesta JSON
          foreach ($data as &$personaje) {
              if (!empty($personaje['imagen'])) {
                  $personaje['imagen'] = base64_encode($personaje['imagen']);
              }
          }
          echo json_encode($data);
      }
      exit;
  }

  //Actualizar un personaje 
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
   $id = $_POST['id_personaje'];
   $nombre = $_POST['Unombre'];
   $via = $_POST['Uvia'];
   $elemento = $_POST['Uelemento'];
   $eidolons = $_POST['Ueidolons'];
   $rareza = $_POST['Urareza'];
   $link_trailer = $_POST['Ulink_trailer'];

   // Manejo de la imagen
   $imagen = null; // Inicializa la variable imagen
   if (isset($_FILES['Uimagen']) && $_FILES['Uimagen']['error'] === UPLOAD_ERR_OK) {
       $imagen = file_get_contents($_FILES['Uimagen']['tmp_name']);
   }

   // Query para el update a la base
   $update = "UPDATE personaje
              SET nombre = :nombre, via = :via, elemento = :elemento, eidolons = :eidolons, rareza = :rareza, link_trailer = :link_trailer" . 
              ($imagen ? ", imagen = :imagen" : "") . 
              " WHERE id_personaje = :id";
   $ressU = $conn->prepare($update);

   // Prepara los parámetros
   $params = [
       ':nombre' => $nombre,
       ':via' => $via,
       ':elemento' => $elemento,
       ':eidolons' => $eidolons,
       ':rareza' => $rareza,
       ':link_trailer' => $link_trailer,
       ':id' => $id
   ];

   // Si hay imagen, añadirla a los parámetros
   if ($imagen) {
       $params[':imagen'] = $imagen;
   }

   // Ejecuta la consulta con los parámetros
   $ressU->execute($params);

   header("Location: personajes.php");
   exit;
}

    //Eliminar un personaje de la base
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
        $id = $_POST['id_personaje'];
        
        $delete = "DELETE FROM personaje WHERE id_personaje = :id";
        $ressD = $conn->prepare($delete);
        $ressD->execute([
            ':id' => $id
        ]);
        
        header("Location: personajes.php");
        exit;
    }

    //Insertar un personaje en la base
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $nombre = $_POST['nombre'];
          $via = $_POST['via'];
          $elemento = $_POST['elemento'];
          $eidolon = $_POST['eidolons'];
          $rareza = $_POST['rareza'];
          $link = $_POST['link_trailer'];

          // Manejo de la imagen
        $imagen = null; // Inicializa la variable imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
        }
  
          // Query para insertar en la base
          $insert = "INSERT INTO personaje (nombre, via, elemento, eidolons, rareza, imagen, link_trailer)
                     VALUES (:nombre, :via, :elemento, :eidolons, :rareza, :imagen, :link_trailer)";
          $ressI = $conn->prepare($insert);
          
          // Prepara los parámetros
        $params = [
            ':nombre' => $nombre,
            ':via' => $via,
            ':elemento' => $elemento,
            ':eidolons' => $eidolon,
            ':rareza' => $rareza,
            ':link_trailer' => $link
        ];

        // Si hay imagen, añadirla a los parámetros
        if ($imagen) {
            $params[':imagen'] = $imagen;
        }

        // Ejecuta la consulta con los parámetros
        $ressI->execute($params);

        header("Location: personajes.php");
        exit;
      }
    
      //Enviar los datos en JSON
      header('Content-Type: application/json');
      echo json_encode($data);
      exit;
   }catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>