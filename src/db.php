<?php

function select($sTabela, array $aColunas, $sWhere = false) {
    $sColunas = implode(", ", $aColunas);
    $sSql = "SELECT $sColunas FROM $sTabela";
    $sWhere && $sSql .= " WHERE $sWhere";
    
    $result = pg_query(getDbConn(), $sSql);
    return pg_fetch_all($result);
}

function update($sTabela, array $aColunas, $aValores, $sWhere) {
    for($iCampo = 1; $iCampo <= count($aColunas); $iCampo++) {
        $varCol = "$".$iCampo;
    }
    $result = pg_query_params(
        getDbConn(), 
        "UPDATE " . $sTabela . " SET " . $aColunas . " = " . $varCol . " WHERE " . $sWhere, 
        $aValores
    );
    return $result;
}

function insert($sTabela, array $aColunas, $aValores) {
    $placeholders = array_map(fn($index) => "$" . ($index + 1), array_keys($aValores));
    $sColunas = implode(", ", $aColunas);
    $sValores = implode(", ", $placeholders);
    $result = pg_query_params(
        getDbConn(), 
        "INSERT INTO $sTabela ($sColunas) VALUES ($sValores) RETURNING *",
        $aValores);
    return pg_fetch_assoc($result);
}

function delete($sTabela, $sWhere) {
    //TODO implementar método de delete
}

function getDbConn() {
    $conexao = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/trabalhoHospital/TrabalhoSemestral-main/config/config.env'));
    $database = $conexao->database;
    return pg_connect("host=".$database->host." port=".$database->port." dbname=".$database->dbname." user=".$database->user." password=".$database->password);
}

?>