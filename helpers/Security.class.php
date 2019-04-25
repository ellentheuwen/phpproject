<?php
    class Security {
        public $password;
        public $passwordConfirmation;

        // check if passwords are secure to use in my signup process
        public function passwordsAreSecure(){
            if( $this->passwordIsStrongEnough() 
                && $this->passwordsAreEqual() ){
                return true;
            }
            else {
                return false;
            }
        }
		
		// check is password has more than 8 characters
        private function passwordIsStrongEnough(){
            if( strlen( $this->password ) <= 8 ){
                return false;
            }
            else {
                return true;
            }
        }
		
        private function passwordsAreEqual(){
            if( $this->password == $this->passwordConfirmation ){
                return true;
            }
            else {
                return false;
				throw new Exception("Your passwords do not match.");

            }
        }
		
		// checks if a given email is valid
        public static function isEmailValid($email){
            if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
                throw new Exception("Oops, that doesn't look like a valid email.");
            }else{
                    return true;
                }
        }
		
    }