<?php

require_once 'import/config.php';

session_start();
session_destroy();
header('Location: '.__PROD__);