<?php

class Validator
{
    private $data;
    private $session;
    private $errors = [];

    public function __construct($data,$session)
    {
        $this->data = $data;
        $this->session = $session;
    }

    private function getField($field)
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }

    public function isAlphaNum($field, $errorMsg)
    {
        if (!isset($this->data[$field]) || !preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
            $this->errors[$field] = $errorMsg;
            $this->session->setFlash('danger', $errorMsg);
        }
    }

    public function isUnique($field, $db, $table, $errorMsg)
    {
        $record = $db->query("SELECT id_user from $table WHERE $field = :id", [':id' => $this->getField($field)])->fetch();
        if ($record) {
            $this->errors[$field] = $errorMsg;
            $this->session->setFlash('danger', $errorMsg);
        }
    }

    public function isEmail($field, $errorMsg)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
            $this->session->setFlash('danger', $errorMsg);
        }
    }

    public function isConfirmed($field, $errorMsg)
    {
        if (empty($this->getField($field)) || $this->getField($field) != $this->getField($field . '_confirm')) {
            $this->errors[$field] = $errorMsg;
            $this->session->setFlash('danger', $errorMsg);
        }
    }
    
    public function isEmpty($field, $errorMsg)
    {
        if (empty($this->getField($field))) {
            $this->errors[$field] = $errorMsg;
            $this->session->setFlash('danger', $errorMsg);
        }
    }
        

    public function isValid()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}