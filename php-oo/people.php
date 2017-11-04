<?php

class People
{
	private $name;
	private $lastname;
	private $phone;
	private $email;
	private $cpf;

	public function __construct($name = null, $lastname = null, $phone = null, $email = null, $cpf = null)
	{
		$this->name = $name;
		$this->lastname = $lastname;
		$this->phone = $phone;
		$this->email = $email;
		$this->cpf = $cpf;
	}

	$user = new People();
	$user2 = new People('Tommye', 'Toledo', '98 9 84030288', 'tommye@teste.com', '98765432100');

	public function getName()
	{
		return $this->name;
	}

	public function setName($name) 
	{
		$this->name = $name;
	}

	public function getLastName()
	{
		return $this->lastname;
	}

	public function setLastName($lastname) 
	{
		$this->lastname = $lastname;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($phone) 
	{
		$this->phone = $phone;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email) 
	{
		$this->email = $email;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setCpf($cpf) 
	{
		$this->cpf = $cpf;
	}

	public function __toString()
	{
		return 'People: ' . $name . ' ' . $lastname . ' - ' . $cpf;
	}
}