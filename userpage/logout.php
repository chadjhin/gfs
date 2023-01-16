<?php
session_destroy();
session_unset();
header("Location:../userindex/index(orig).php");
?>