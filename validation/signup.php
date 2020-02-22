<?php
    include_once('models/UserModel.php');

    class UserSignupRequest {

        public function validate() {
            $userModel = new UserModel();
            $data = array_map('trim', filter_input_array(INPUT_POST));
            $arrErrors = [];

            if (empty($data['signup_token'])) {
                $arrErrors[] = "Signup token is required";
            }
            if (!empty($data['signup_token']) && !checkCsrfToken($data['signup_token'])) {
                $arrErrors[] = "Signup token is invalid or expired, refresh page to conitnue";
            }
            if (empty($data['name'])) {
                $arrErrors[] = "Name is required";
            }
            if (empty($data['email'])) {
                $arrErrors[] = "Email address is required";
            }
            if (!empty($data['email']) && !$userModel->checkEmailRegistered($data['email'])) {
                $arrErrors[] = "Email address already registered, try logging in the application";
            }
            if (empty($data['password'])) {
                $arrErrors[] = "Password is required";
            }

            return $arrErrors;
        }

    }
    