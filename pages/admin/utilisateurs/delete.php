<?php
App::getInstance()->getTable('Utilisateur')->delete($_POST['id']);
header('location: admin.php?p=utilisateurs');