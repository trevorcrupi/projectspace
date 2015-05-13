<?php

class ItemsController extends Controller {

	function view($id = null,$name = null) {
		$this->set('title', $name.' - My Todo List App');
		/*$cols = array('id');
		$params = array($id);
		$row = $this->Item->select('items', $params, $cols);
		$this->set('todo', $row);*/
		$this->Item->query('SELECT * FROM items WHERE id=:id');
		$this->Item->bind(':id', $id);
		$this->set('todo', $this->Item->single());
	}

	function viewall() {
		$this->set('title','All Items - My Todo List App');
		$this->set('todo',$this->Item->selectAll('items'));
	}

	function add() {
		$this->set('title','Success - My Todo List App');
		$request = load_class('Request');
		$name = $request->post('todo');
		$date = $request->post('date');
		$this->Item->insert('items', array($name, $date), array('item_name', 'date'));
	}

	function delete($id = null) {
		$this->set('title','Success - My Todo List App');
		$this->Item->query('DELETE FROM `items` WHERE id=:id');
		$this->Item->bind(':id', $id);
		$this->Item->execute();
	}
}
