<?php
session_start();

// Destrua todas as variáveis de sessão
session_unset();

// Destrua a sessão
session_destroy();

// Redirecione de volta para a página de login
header("Location: login.html");
exit();
?>