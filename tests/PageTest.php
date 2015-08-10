<?php

class PageTest extends TestCase {

    /**
     * Test that the index page is viewable
     *
     * @return void
     */
    public function testIndexPage()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test that the about page is viewable
     *
     * @return void
     */
    public function testAboutPage()
    {
        $response = $this->call('GET', '/about');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test that the gallery page is viewable
     *
     * @return void
     */
    public function testGalleryPage()
    {
        $response = $this->call('GET', '/gallery');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test that the contact page is viewable
     *
     * @return void
     */
    public function testContactPage()
    {
        $response = $this->call('GET', '/contact');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
