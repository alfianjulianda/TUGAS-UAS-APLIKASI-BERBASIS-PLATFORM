<?php

class Controller {

    public function view($view, $data = []) {
        extract($data);

        require_once "../app/Views/layouts/header.php";
        require_once "../app/Views/$view.php";
        require_once "../app/Views/layouts/footer.php";
    }
}
