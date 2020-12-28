<?php



namespace unit;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected  $user;
    // it will call before every single test function call

    protected function setUp(): void {
        $this->user = new \App\Models\User;
    }
    /** @test */
    public function we_can_get_the_first_name(){


        $this->user->setFirstName("Muhammad Nabeel Mehmood");

        $this->assertEquals($this->user->getFirstName(), "Muhammad Nabeel Mehmood");
    }

    /** @test */
    public function we_can_get_the_last_name(){


        $this->user->setLastName("Tahir Mehmood");

        $this->assertEquals($this->user->getLastName(), "Tahir Mehmood");
    }

    public function testThatWeCanGetTheFullName(){

        $this->user->setFirstName("Muhammad Nabeel Mehmood");
        $this->user->setLastName("Tahir Mehmood");

        $this->assertEquals($this->user->getFullName(), "Muhammad Nabeel Mehmood Tahir Mehmood");
    }

    public function testEmailAddressCanBeSet(){
        $this->user->setEmail('nabeel@rebeltechnology.io');

        $this->assertEquals($this->user->getEmail(),'nabeel@rebeltechnology.io');
    }

    public function testEmailVariablesContainsCorrectValues(){

        $this->user->setFirstName('Muhammad Nabeel Mehmood');
        $this->user->setLastName("Tahir Mehmood");

        $this->user->setEmail('nabeel@rebeltechnology.io');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        $this->assertEquals($emailVariables['full_name'],'Muhammad Nabeel Mehmood Tahir Mehmood');
        $this->assertEquals($emailVariables['email'],'nabeel@rebeltechnology.io');


    }


}