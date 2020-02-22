<?php

    include_once('models/UserModel.php');
    include_once('validation/signup.php');

    class Users extends UserModel {

        public function saveUser() {
            $request = new UserSignupRequest();
            $response = $request->validate();
            if (!empty($response)) {
                return json([
                    'status' => 'invalid',
                    'message' => implode('<br />', $response)
                ]);
            }
            $data = [
                'name' => filter_input(INPUT_POST, "name"),
                'email' => filter_input(INPUT_POST, "email"),
                'password' => crypt(filter_input(INPUT_POST, "password"), ENCRYPT_SALT)
            ];
            $saved = $this->save('users', $data);
            if ($saved) {
                return json([
                    'status' => 'success',
                    'message' => 'You have been successfully registered, please login to continue',
                    'token' => csrf_token()
                ]);
            }
            return json([
                'status' => 'error',
                'message' => 'Something went wrong, please try again'
            ]);
        }

    }
    