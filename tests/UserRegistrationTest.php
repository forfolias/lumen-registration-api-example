<?php

class UserRegistrationTest extends TestCase
{
    /**
     * Test 404 page
     *
     * @return void
     */
    public function testInvalidUrl()
    {
        $this->get('/');
        $this->assertResponseStatus(404);
    }

    /**
     * Invalid registration - missing or empty params
     *
     * @return void
     */
    public function testInvalidRegistrationMissingParams()
    {
        $this->post('/register');
        $this->assertResponseStatus(422);

        $this->post('/register', ['name' => "", 'email' => ""]);
        $this->assertResponseStatus(422);

        $this->post('/register', ['name' => ""]);
        $this->assertResponseStatus(422);

        $this->post('/register', ['email' => ""]);
        $this->assertResponseStatus(422);
    }

    /**
     * Invalid registration - invalid email
     *
     * @return void
     */
    public function testInvalidRegistrationEmail()
    {
        $this->post('/register', ['name' => "George", 'email' => "george"]);
        $this->assertResponseStatus(422);
    }

    /**
     * Inalid registration - User exists
     *
     * @return void
     */
    public function testInvalidRegistrationDuplicateUser()
    {
        $this->post('/register', ['name' => "George", 'email' => "george@vasilakos.com"]);
        $this->post('/register', ['name' => "George", 'email' => "george@vasilakos.com"]);
        $this->assertResponseStatus(422);
    }

    /**
     * Valid registration
     *
     * @return void
     */
    public function testValidRegistration()
    {

        $this->post('/register', ['name' => "George", 'email' => "info@vasilakos.com"]);
        $this->assertResponseStatus(200);
    }
}
