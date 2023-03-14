<?php
include_once 'core/init.php';

if(Input::exists()){
if(Token::check(Input::get('token'))){

$validate = new Validate();

$validate->check($_POST, 
                   array(
                   'username' => array(
                   'required' => true,
                   'min'      => 2,
                   'max'      => 50,
                   'unique'   => 'users'
                 ),

                 'password' => array(
                   'required' => true
                 ),
                 
                 'name' => array(
                   'required' => true,
                   'min'      => 2,
                   'max'      => 50,
                 ),
                 
                 'cpassword' => array(
                  'matches'  => 'password',
                  'required' => true
                 )

                 )); 

if($validate->passed()){

  try{
    $user = new User();
    $salt = Hash::salt(32);
  
    $user->create(array(
      'username' => Input::get('username'),
      'password' => Hash::make(Input::get('password'), $salt),
      'salt'     => $salt,
      'name'     => Input::get('name'),
      'joined'   => date('Y-m-d H:i:s'),
      'group'    => 1


    ));

    Session::flash('success', 'Registration was successful!, you can now logi into your account');
    Redirect::to('index.php');


  }catch(Exception $e){
    die($e->getMessage());

  }

}else{

  foreach($validate->display() as $display){
    echo "{$display} <br />";
  }
}
}       
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<fieldset>
<title>title="Register Form</title>
<form action="" method="post" autocomplete="off">
<input type="text" name="username" id="username" placeholder="Username" value="<?= escape(Input::get('username')); ?>">
<br />
<input type="password" name="password" id="password" placeholder="Password">
<br />

<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
<br />

<input type="text" name="name" id="name" placeholder="Name" value="<?= escape(Input::get('name')); ?>">
<br />
<input type="hidden" name="token" value="<?= Token::generate(); ?>" />
<input type="submit" value="Register">

</form>
</fieldset>

    
</body>
</html>