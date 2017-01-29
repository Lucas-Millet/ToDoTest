<?php

require_once 'Model/TaskModel.php';

class ListController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->taskModel->getTasks();

        require_once 'View/list.html';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskName = $_POST['task'];
            if ($taskName == '') {
                $error = 'Vous devez saisir du texte';
                require_once 'View/add_form.html';
                return;
            }
            $this->taskModel->insertTask($taskName);
            header('Location: /app.php?action=list');
        } else {
            require_once 'View/add_form.html';
        }
    }

    public function noResourceFound()
    {
        http_response_code(404);
    }
}
