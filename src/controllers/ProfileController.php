<?php

class ProfileController extends Controller {

    public function index($user) {
        echo "USER: " . $user;
    }

    public function show($user) {
        echo "USER: " . $user;
        
    }

    public function edit($user) {
        echo "USER: " . $user;
        $user = UserService::getUserByName($user);
        var_dump($user);

        
    }

}