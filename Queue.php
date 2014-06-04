<?php

require "Node.php";

Class Queue {
	private $root;
	private $size;
	
	public function __construct() {
		$this->size = 0;
	}
	
	public function enqueue($data) {
		$current = $this->root;
		if($current == null) {
			$current = new Node($data);
			$this->root = $current;
			$this->size++;
		}
		else {
			$this->_enqueue($current, $data);
		}
	}
	
	private function _enqueue($current, $data) {
		if($current->next != null) {
			$this->_enqueue($current->next, $data);
		}
		else {
			$current->next = new Node($data);
			$this->size++;
		}
	}
	
	public function peek() {
		$current = $this->root;
		$value = $current->data;
		return $value;
	}
	
	public function dequeue() {
		$current = $this->root;
		$value = $current->data;
		$current = $current->next;
		$this->root = $current;
		$this->size--;
		return $value;
	}
	
	public function search($needle) {
		return $this->_search($this->root, $needle, 0);
	}
	
	private function _search($current, $needle, $index) {
		if($current->data == $needle) {
			return $index;
		}
		else if($current->data != $needle && $current->next != null) {
			return $this->_search($current->next, $needle, $index + 1);
		}
		else {
			return -1;
		}
	}
}
