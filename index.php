<?php 
require 'controler/Main.php';

if(empty($_GET)) {
    require_once 'view/slider.php';
} 
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listeChapitres') {
        listPosts();
    } elseif ($_GET['action'] === 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
        postComments((int) $_GET['id']);
    }
} 
