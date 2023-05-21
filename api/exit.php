<?php
session_start();
unset($_SESSION['user']);
header("Refresh: 5");
echo "куку";