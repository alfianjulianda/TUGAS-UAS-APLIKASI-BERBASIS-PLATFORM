<?php

class View {
    public static function render($view, $data = []) {
        extract($data);
        require "../app/Views/$view.php";
    }
}
