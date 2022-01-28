<?php

abstract class database {
    abstract public function create($table, $data);
    abstract public function update($table, $where, $data);
    abstract public function delete($table, $where);
    abstract public function get($table, $where, $limit, $offset);
    abstract public function getSingle($id);

}