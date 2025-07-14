<?php

// test the home page loads
test('home page loads', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});
