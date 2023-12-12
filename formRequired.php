<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .title{
        display: flex;
        font-size: 50px;
        font-weight: 600;
        align-items: center;
        justify-content: center;
        margin-bottom: 80px;
    }
    .form-group{
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }
    .form-group > label{
        padding-left: 220px;
    }
</style>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<fieldset>

<!-- Form Name -->
<legend class="title">PHP Form Required</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="name" type="text" placeholder="" class="form-control input-md">
  <span class="error">* <?php echo $nameErr;?></span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">E-mail</label>  
  <div class="col-md-4">
  <input id="textinput" name="email" type="text" placeholder="" class="form-control input-md">
  <span class="error">* <?php echo $emailErr;?></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Website</label>  
  <div class="col-md-4">
  <input id="textinput" name="website" type="text" placeholder="" class="form-control input-md">
  <span class="error"><?php echo $websiteErr;?></span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Comment</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="comment"></textarea>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="gender" id="radios-0" value="Female">
      Female
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="gender" id="radios-1" value="Male">
      Male
    </label> 
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="gender" id="radios-2" value="Other">
      Other
    </label>
    <span class="error">* <?php echo $genderErr;?>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>

<br/><br/><br/>

<section class="intro">
  <div class="gradient-custom-2 h-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-dark table-bordered mb-0">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Website</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Gender</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <?php
                            echo $name;
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $email;
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $website;
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $comment;
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $gender;
                        ?>
                    </td>
                  </tr>
                </tbody>
              </table>
              <br/><br/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>