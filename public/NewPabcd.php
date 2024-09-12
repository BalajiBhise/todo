1. create a funtion to get 2nd highest number from array ? in php

=> function getSecondHighestNumber(array $numbers): int
{
// Remove duplicates and sort the array in descending order
$uniqueNumbers = array_unique($numbers);
rsort($uniqueNumbers);

// Return the 2nd highest number (or null if the array has less than 2 unique numbers)
return count($uniqueNumbers) > 1 ? $uniqueNumbers[1] : null;
}

without Using Built in Function
function getSecondHighestNumber(array $numbers): int
{
    $max = $numbers[0];
    $secondMax = null;

    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] > $max) {
            $secondMax = $max;
            $max = $numbers[$i];
        } elseif ($numbers[$i] > $secondMax && $numbers[$i] != $max) {
            $secondMax = $numbers[$i];
        }
    }

    return $secondMax;
}

================================================================================================================================================

2. What is facade ? 

    - Facade is a static class which means you can access their methods without creating instance of Class .
    - Facade is used to provide a simple interface to a complex system of classes and objects.
    - Facade is used ti hide complexity of code from client.
    e.g.
        use Illuminate\Support\Facade\Log 
        Log::info("Hello World");

        - here Log is Facade Class and info is method of that class , because of facade we dont need to create a object of Log Class.

================================================================================================================================================

3. difference between span and div

=> - Span is inline element which means it does not start on a new line while div is block level element which means it start on new line
   - It is used to apply css styles , javascript behaviour to a specific section of text or inline content 
        while div is used to create container for other elements.

================================================================================================================================================

4. What pseudo class in CSS ? 

=>  - pseudo class is a keyword that is added to selector to specify a special state of an element.
    - pseudo class are used to apply Styles to element based on their state such as whene they are hovered , focusued or visited.
    e.g.
        1. a:hover{
            color : red;
           }
        2. a:active {
            color : blue;
           }
        3. input:focus{
                border : 1px solid red;
            }

================================================================================================================================================

5. Can we Inherit Final Class in php ? 

=> Now We Can't Inherit Final Class .Final keyword is used to prvent a class from being inherited.

================================================================================================================================================

6 Laravel traits 

=> Traits - Tratis are a way to reuse the code and provide a set of methods that can be used in Multiple classes.
        - It does not have constructor . 
        - trait define using 'trait' keyword followed by name of trait.
        e.g. trait abc{
            function hello{
                echo "Hello";
            }
        }

        - Use trait in class then 'use' keyword followed by name of trait.
        e.g.
            class xyz{
                use abc;
            }

================================================================================================================================================
    
7. Service Container : 

=> Service Container is a registry of instances and binding that can be used to resolve dependencies between classes .
  - it's a container that holds instances of classes and provide a way to retrive those instaces when they are needed.
  - service container used when one class depends on another class 
  - it's a way to manage the dependencies between classes.

        // Define the MyDependency class
        class MyDependency {
            public function doSomething() {
                return 'Doing something...';
            }
        }

        // Define the MyClass class that depends on MyDependency
        class MyClass {
            private $dependency;

            public function __construct(MyDependency $dependency) {
                $this->dependency = $dependency;
            }

            public function doSomethingElse() {
                $result = $this->dependency->doSomething();
                return "Did something else: $result";
            }
        }

        // Bind the MyDependency class to the container
        $app->bind('MyDependency', function ($app) {
            return new MyDependency;
        });

        // Resolve the MyClass instance from the container
        $myInstance = $app->make('MyClass');

        // Use the MyClass instance
        $result = $myInstance->doSomethingElse();
        echo $result; // Output: Did something else: Doing something...

================================================================================================================================================

8. what is latest version of Laravel and PHP ?

=> Laravel => 11 and supports minimum PHP version is 8.1
    PHP => 8.3 

================================================================================================================================================

9. Flow Of Cookie 

=>  Cookies are stored in Client side which means they are stored on client User Web Broweser .
    - When Cookie is set , it is sent to client's Brpwser and the browser stores it.
    - When the client makes a request to the server, the browser sends the cookie with the request and server retrive cookie and use it.
    - If the cookie is set to expire, it will be deleted from the browser after the expiration


================================================================================================================================================

10. Flow of Session 

=> - when a user makes request to Laravel Aplication , the framework checks if session has already been created.
   - If No Session exist , Laravel Creates a new Session and ganerate a Unique Session ID
   - This Session Id stores in a cookie on client web browser.
   - when client make request to application ,  laravel checks the session cookie sent by the client.
   - if the session Id is valid , Laravel Retrives the corresponding session data from session storage.
   - Laravel uses the session data to authenticate the user and authorize the user to access the application.
   - If the session Id is invalid , Laravel creates a new session and ganerate a new session.

   Session file is stored at storage/framework/session
================================================================================================================================================

11. Flow Of URL Request 

=>  1. Request to Laravel Application
    2. Request sent to server where it is received by web server(APache , Nginx).
    3. Web server receives the request and passes it to PHP-FPM (FastCGI)
    4. PHP-FPM receives the request and passes it to Laravel Framework
    5. Laravel Framework receives the request and checks the route of the request(web.php or api.php).
    6. Laravel Framework checks the middleware of the route.
    7. Laravel Framework checks the authentication of the route.
    8. Laravel Framework checks the authorization of the route.
    9. Laravel Framework executes the route.

================================================================================================================================================

12. Type Of Authentication :

=>  1. Session-based Authentication: 
        - In this type of authentication, a user's credentials are verified, and a session is created on the server. 
        - The user is then authenticated for subsequent requests based on the session.

    2. Token-based Authentication: 
        - In this type of authentication, a user's credentials are verified, and a token is generated and sent to the client. 
        - The client then includes this token in subsequent requests to authenticate the user.

    3. Basic Authentication: 
        - In this type of authentication, a user's credentials (username and password) are sent with each request in plain text.

    4. Two-Factor Authentication (2FA): 
        - In this type of authentication, a user's credentials are verified, and 
        - then a second form of verification (e.g., a code sent to a mobile device) is required to complete the authentication process.

    5. Multi-Factor Authentication (MFA): 
        - In this type of authentication, a user's credentials are verified, and 
        - then multiple forms of verification (e.g., a code sent to a mobile device, a biometric scan) are required to complete the authentication process.

    6. Single Sign-On (SSO) Authentication: 
        - In this type of authentication, a user's credentials are verified, and 
        - then the user is authenticated across multiple applications or systems.

================================================================================================================================================

13. Basic GIT Commands : 

=>  git init: Initializes a new Git repository in the current directory.
    git add <file>: Stages a file for the next commit.
    git add .: Stages all changes in the current directory and subdirectories.
    git commit -m "<message>": Commits staged changes with a meaningful commit message.
    git log: Displays a log of all commits made to the repository.
    git status: Displays the status of the repository, including any changes or untracked files.

================================================================================================================================================

12. How Many ways you can keep your application Secure ? 

=> a. Using CSRF Token
   b. SSL Encryption 
   c. Hash and Verify Password 
   d. Implement Auth Login
   e. Middleware
   f. 2FA
   g. Implement Rate Limiting


================================================================================================================================================

13. What is Rate Limiter ? 

=> Rate Limiter is a Laravel Feature that allows you to limit the number of request that can be made to your application within a certain time period
  - It is Useful for preventing abuse such as brute-force attaks.
  - You can add Rate Limiter in various places like Route Middleware , Controller Middleware , Global Middlware , API Routes

 ================================================================================================================================================

 






    







