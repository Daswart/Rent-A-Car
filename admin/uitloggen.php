<?php

require('inc/functies.php');

session_start();
session_destroy();
redirect('index.php');