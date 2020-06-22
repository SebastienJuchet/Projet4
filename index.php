<?php 
require 'controler/Main.php';
if(empty($_GET)) {
    require 'view/slider.php';
} 
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listeChapitres') {
        listPosts();
    }
}
