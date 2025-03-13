<?php
    //Declarar los header
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

    //incluir archivo de conexion
    include "conn.php";

    //guardar en variable
    $_method = $_SERVER['REQUEST_METHOD'];

    switch($_method){
        case 'GET':
            $query = "SELECT * FROM personaje";
            $result = $conn->query($query);
            $data = $result->fetchAll();
            echo json_encode($data);
            break;

        case 'DELETE':
            $id = $_POST['id_personaje'];

            $delete = "DELETE FROM personaje WHERE id_personaje = :id";
            $ressD = $conn->prepare($delete);

            $ressD->execute([
                ':id' => $id
            ]);
            
            break;
        
        case 'PUT':
            $id = $_POST['id_personaje'];
            $nombre = $_POST['Unombre'];
            $via = $_POST['Uvia'];
            $elemento = $_POST['Uelemento'];
            $eidolon = $_POST['Ueidolons'];
            $rareza = $_POST['Urareza'];
            $img = $_POST['Uimagen'];
            $link = $_POST['Ulink_trailer'];

            $update = "UPDATE personaje
                    SET nombre = :Unombre, via = :Uvia, elemento = :Uelemento, eidolons = :Ueidolons, rareza = :Urareza, imagen = :Uimagen, link_trailer = :Ulink_trailer
                    WHERE  id_personaje = :id";
            $ressU = $conn->prepare($update);
        
            $ressU ->execute([
                ':nombre' => $nombre,
                ':via' => $via,
                ':elemento' => $elemento,
                ':eidolons' => $eidolon,
                ':rareza' => $rareza,
                ':id' => $id,
                ':img' => $img,
                ':link_referencia' => $link,
                ':id' => $id
            ]);
            break;

        case 'POST':
            $nombre = $_POST['nombre'];
            $via = $_POST['via'];
            $elemento = $_POST['elemento'];
            $eidolon = $_POST['eidolons'];
            $rareza = $_POST['rareza'];
            $img = $_POST['imagen'];
            $link = $_POST['link_trailer'];

            $insert = "INSERT INTO personaje(nombre, via, elemento, eidolons, rareza, imagen, link_trailer)
            VALUES (:nombre, :via, :elemento, :eidolons, :rareza, :imagen, :link_trailer)";

            $ressI = $conn->prepare($insert);

            $ressI->execute([
                ':nombre' => $nombre,
                ':via' => $via,
                ':elemento' => $elemento,
                ':eidolons' => $eidolon,
                ':rareza' => $rareza,
                ':imagen' => $img,
                ':link_trailer' => $link
            ]);
            break; 

        default:
            break;    
    }  
?>