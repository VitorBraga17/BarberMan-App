<?php 

header("Access-Control-Allow-Origin: *");

$resp = array();
$resp["sucesso"] = true;
$resp["mensagem"] = "";

$host = "localhost:3306";
$user = "root";
$pass = "";
$db   = "appbarber";

$connection = new mysqli($host, $user, $pass, $db);
if ($connection -> connect_error) {
    $resp["sucesso"] = false;
    $resp["mensagem"] = "Erro ao conectar-se ao banco de dados! (" . $connection -> connect_error . ")";
    echo json_encode( $resp );
    exit();
}

$op = "";
if (isset($_GET["op"])) {
    $op = $_GET["op"];
}

if ($op == "read") {
  
    // Lancamentos
    $id = "";
    if (isset($_GET["id"])) {
    	$id = $_GET["id"];
    }

    $pesquisa = "";
    if (isset($_GET["pesquisa"])) {
    	$pesquisa = $_GET["pesquisa"];
    }

    $limit = "";
    if (isset($_GET["limit"])) {
        $limit = $_GET["limit"];    
    }

    $sql_query = "SELECT * FROM horarios ";
    if (!empty($id)) {
        $sql_query .= "WHERE id = $id ";
    }else
    if (!empty($pesquisa)){
      $sql_query .= "WHERE corte like '%$pesquisa%' ";
    }
    $sql_query .= "ORDER BY data";   	
    if (!empty($limit)) {
        $sql_query .= "LIMIT $limit";        
    }
    $sql_query .= ";";
    if (($sql_query_result = $connection->query($sql_query))) {
        $cortes = array();
        while ($corte = $sql_query_result->fetch_assoc()) {
            array_push($cortes, $corte);
        }
        $resp["cortes"] = $cortes; 
    } else {
        $resp["sucesso"] = false;
        $resp["mensagem"] = $connection->error;
    }

} else
if ($op == "create") {

    $data = $_POST["data"];
    $horario = $_POST["horario"];
    $corte = $_POST["corte"];

    $sql_query = "INSERT INTO horarios VALUES (null, '$data', '$horario', '$corte')";
    if (!($connection->query($sql_query))) {
        $resp["sucesso"] = false;
        $resp["mensagem"] = $connection->error . $sql_query;
    }    

} else
if ($op == "update") {

    $id = $_POST["id"];
    $data = $_POST["data"];
    $horario = $_POST["horario"];
    $corte = $_POST["corte"];

    $sql_query = "UPDATE horarios SET data = '$data', horario = '$horario', corte = '$corte' WHERE id = $id";
    if (!($connection->query($sql_query))) {
        $resp["sucesso"] = false;
        $resp["mensagem"] = $connection->error . $sql_query;
    }    


} else
if ($op == "delete") {
    
    $id = 0;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    $sql_query = "DELETE FROM horarios WHERE id = $id;";
    if (!($connection->query($sql_query))) {
        $resp["sucesso"] = false;
        $resp["mensagem"] = $connection->error;
    }
        
}

echo json_encode($resp);
$connection -> close();

?>