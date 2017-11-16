<?php

class UserTest extends \PHPUnit\Framework\TestCase {
  // \PHPUnit_Framework_TestCase{

  public function testThatWeCanGetTheFirstName()
  {
    $user = new \App\Models\User;

    $user->setFirstName('Billy');

    $this->assertEquals($user->getFirstName(),'Billy');
  }

  public function testThatWeCanGetTheLastName()
  {
    $user = new \App\Models\User;

    $user->setLastName('Garrett');

    $this->assertEquals($user->getLastName(),'Garrett');
  }

  public function testFullNameReturned(){
    $user = new \App\Models\User;
    $user->setLastName('Garrett');
    $user->setFirstName('Billy');

    $this->assertEquals($user->getFullName(),'Billy Garrett');
  }

  public function testFirstAndLastNameAreTrimmed(){
    $user = new \App\Models\User;
    $user->setLastName('Garrett  ');
    $user->setFirstName('Billy         ');

    $this->assertEquals($user->getFirstName(),'Billy');
    $this->assertEquals($user->getLastName(),'Garrett');

  }

  public function testEmailAddressCanBeSet(){
    $email='a@a.aa';
    $user = new \App\Models\User;
    $user->setEmail($email);
    $this->assertEquals($user->getEmail(),'a@a.aa');
  }


  public function testEmailVariablesContainCorrect(){
    $user = new \App\Models\User;
    $user->setFirstName('Billy');
    $user->setLastName('Garrett');
    $user->setEmail('a@a.aa');

    $emailVariables = $user->getEmailVariables();

    $this->assertArrayHasKey('full_name',$emailVariables);
    $this->assertArrayHasKey('email',$emailVariables);

    $this->assertEquals($emailVariables['full_name'],'Billy Garrett');
    $this->assertEquals($emailVariables['email'],'a@a.aa');
  }




}
