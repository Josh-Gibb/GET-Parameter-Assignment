    <?php
        $passed = TRUE;
        if(!(isset($_GET["firstname"]) && isset($_GET["lastname"]) && isset($_GET["age"]))){
            $message = "Please enter a firstname, lastname and age in URL";
            $passed = false;
        }
        else{
            $firstname = htmlspecialchars($_GET['firstname']);
            $lastname = htmlspecialchars($_GET['lastname']);
            $age = htmlspecialchars($_GET['age']);
        }
        if((empty($_GET["firstname"]) || empty($_GET["lastname"]) || empty($_GET["age"]))){
            $message = "Please make sure all fields have values";
            $passed = false;
        }
        $firstname = filter_input(INPUT_GET, "firstname", FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_GET, "lastname", FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_NUMBER_INT);
        $date = date('m/d/Y');
        if(empty($firstname) && empty($lastname) && empty($age)){
            $message = "Please make sure there is data in all fields";
            $passed = false;
        }
        if($passed){
            $valid_age = TRUE;
            $message_name = "Hello, my name is " . $firstname . " " . $lastname;
            if(is_numeric($age)){
                $message_age = "I am " . $age . " years old and ";
                if($age >= 18 && $age < 120){
                    $message_age = $message_age . "I am old enough to vote in the United States";
                }
                else if ($age >= 0 && $age < 18){
                    $message_age = $message_age . "I am not old enough to vote in the United States";
                }
                else{
                    $message_age = "Please enter a valid age";
                    $valid_age = false;
                }
            }
            else{
                $message_age = "Please enter a number for age";
                $valid_age = false;
            }
            if($valid_age){
                $message_days = "The number of days " . $firstname . " has lived is " . $age*365.25 . " days"; 
            }
            else{
                $message_days = "Invalid age entered, so cannot calculate days";
            }
            $date = date('m/d/Y');
        }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Activity 2</title>
        <link rel = "stylesheet" href = "css/main.css">
    </head>
    <body>
        <?php
        if($passed){
            include('./Result/successful.php');
        }
        else{
            include('./Result/failed.php');
        } 
        ?>
    </body>
    </html>