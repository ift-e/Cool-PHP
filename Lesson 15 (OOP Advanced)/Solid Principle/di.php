<?php
// It's just code to understand the concept
// Dependency Inversion Principle

// bad code example
class Authenticator1
{
    function authenticate($userName, $password, $external = false, $externalService = false)
    {
        if($external == true &&  "google" == $externalService){
            $ga = new GoogleAuthenticator();
            $ga->authenticate();
        }elseif($external == true &&  "github" == $externalService){
            $ga = new GithubAuthenticator();
            $ga->authenticate();
        }else{
            $la = new LocalAuthenticator();
            $la->authenticate();
        }
    }
}


// good code
interface AuthServiceProviderInterface{
    function authenticate();
}

class GithubAuthenticator implements AuthServiceProviderInterface{
    function authenticate()
    {
        // do what needed to do here in GitHub auth
    }
}

class LocalAuthenticator implements AuthServiceProviderInterface{
    function authenticate()
    {
        // do what needed to do here in local auth
    }
}


class Authenticator{
    private $authServiceProvider;
    function __construct(AuthServiceProviderInterface $asp){
        $this->authServiceProvider = $asp;
    }
    function authenticate(){
        $this->authServiceProvider->authenticate();
    }
}

$ga = new GithubAuthenticator();
$auth = new Authenticator($ga);
$auth->authenticate();

$la = new LocalAuthenticator($userName, $password);
$auth = new Authenticator($la);
$auth->authenticate();