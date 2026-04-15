<?php
if(isset($_COOKIE['usuario'])){
    echo "Cookie funcionando: " . $_COOKIE['usuario'];
} else {
    echo "Cookie NÃO está funcionando";
}
?>