<?php



function danger( $danger = null) : void 
{   
    if(!empty($danger) && $danger == true){
        $messages = [];
        is_array($danger) ? $messages = $danger : array_push($messages , $danger);


        echo "<div class='alert alert-danger' role='alert'>";
        foreach ($messages as $value) {
            echo $value . '<br>' ;
        }

        echo "</div>";
    }
        

    
    
}


function success($success = null) : void
{
    if(!empty($success) && $success == true){
        $messages = [];
        is_array($success) ? $messages = $success : array_push($messages , $success);


        echo "<div class='alert alert-success' role='alert'>";
        foreach ($messages as $value) {
        echo $value ;
        }

        echo "</div>";
    }
}


?>

