<?php
$mongo= new MongoClient();
$db=$mongo->local;
$collection=$db->help;

$errorMSG = "NOT FOUND";
{
$insert= array(
    name=>$_POST["name"],
    email=>$_POST["email"],
    mobile=>$_POST["mobile"],
    Message=>$_POST["Message"],
);
if($collection->insert($insert))
echo "Data is Inserted"
}
else{
    echo "ERROR"
}
else{
    echo "No data is stored"
}
$EmailTo = "gaming.zone24680@gmail.com";
$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "guest: ";
$Body .= $guest;
$Body .= "\n";
$Body .= "event: ";
$Body .= $event;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>