<?php 

require 'controler/Main.php';
if(empty($_GET)) {
    require_once 'view/slider.php';
} 
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listeChapitres') {
        listPosts();
    } elseif ($_GET['action'] === 'post' && isset($_GET['id'])) {
        if ($_GET['id'] > 0) {
            postComments($_GET['id']);
        }
    }
} 
