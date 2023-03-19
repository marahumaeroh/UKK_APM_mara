<?php  
function countdata($table){
    $db = \Config\Database::connect();
return $db->table($table)->countAllResults();
}
