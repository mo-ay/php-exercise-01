<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylePart2.css">
</head>

<body>
  <div class="formcontainer">
  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="calculator" method="POST">
    <h1>Income Tax calculator</h1>
    <hr>
      <div class="container">
        <label for="salary"><b>Salary in USD</b></label>
        <input type="number" placeholder="Enter your salary in USD" name="salary" required>
        <p>Please select option</p>
        <input type="radio" id="option1" name="option" value="Monthly" checked>
        <label for="option1">Monthly</label><br>
        <input type="radio" id="option2" name="option" value="Yearly">
        <label for="option2">Yearly</label><br>
        <label for="taxfree"><b>Tax free allowance in USD</b></label>
        <input type="number" placeholder="Enter Tax free allowance in USD" name="taxfree" required>
        <button name="culculateSubmit" type="submit"><b>Calculate</b></button>

      </div>
    </form>
    <?php
    $salary = $option = $taxFree = $MsocialSecFee = $MtaxAmount = $Msalary  = $Ysalary = 
    $YsocialSecFee = $YtaxAmount  = $MSalaryWithFreeTax=
    $YSalaryWithFreeTax = "----";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //validate the variable
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      //git values
        $salary = test_input( $_POST['salary']);
        $option = test_input( $_POST['option']);
        $taxFree = test_input($_POST['taxfree']);
        $MsocialSecFee = $MtaxAmount = $Msalary  = $Ysalary = 
        $YsocialSecFee = $YtaxAmount  = $MSalaryWithFreeTax=
        $YSalaryWithFreeTax = 0;

      
      
      //calculate total salary monthly or yearly
      if(strcasecmp($option,"Monthly")== 0){
        $Ysalary = $salary *12;
        $Msalary = $salary;
      }else{
        $Msalary = $salary/12;
        $Ysalary = $salary;
      }

      //calculate social security fee above 10 grand
      if($Ysalary > 10000){
        $MsocialSecFee = $Msalary * 0.04;
        $YsocialSecFee = $Ysalary * 0.04;
      }

      //calculate tax amount
      if ($Ysalary >= 10000 && $Ysalary <25000) {//11% tax
        $MtaxAmount = $Msalary*0.11;
        $YtaxAmount = $Ysalary*0.11;

        $Msalary = $Msalary - $MtaxAmount;
        $Ysalary = $Ysalary - $YtaxAmount;
      }
      elseif ($Ysalary>=25000 && $Ysalary < 50000) {//30$ TAX
        $MtaxAmount = $Msalary*0.3;
        $YtaxAmount = $Ysalary*0.3;

        $Msalary = $Msalary - $MtaxAmount;
        $Ysalary = $Ysalary - $YtaxAmount;
        
      }
      elseif ($salary>=50000) {//45% TAX
        $MtaxAmount = $Msalary*0.45;
        $YtaxAmount = $Ysalary*0.45;

        $Msalary = $Msalary - $MtaxAmount;
        $Ysalary = $Ysalary - $YtaxAmount;
        
      }
      //all cases checked, now add free tax allowance
      $MSalaryWithFreeTax= $Msalary  +($taxFree  /12);
      $YSalaryWithFreeTax= $Ysalary  +$taxFree ;

    }
    ?>
    <div class="result">
      <h1>The result</h1>
      <hr>
      <table>
        <tr>
          <th></th>
          <th>Monthly</th>
          <th>Yearly</th>
        </tr>
        <tr>
          <td>Total salary</td>
          <td > <?php echo $Msalary ?> </td>
          <td> <?php echo $Ysalary ?> </td>
        </tr>

        <tr>
          <td>Tax amount</td>
          <td><?php echo $MtaxAmount?>  </td>
          <td><?php echo $YtaxAmount?> </td>
        </tr>
        <tr>
          <td>Social security fee amount</td>
          <td><?php echo $MsocialSecFee ?> </td>
          <td><?php echo $YsocialSecFee ?> </td>
        </tr>
        <tr>
          <td>Salary after tax</td>
          <td><?php echo $MSalaryWithFreeTax ?> </td>
          <td><?php echo $YSalaryWithFreeTax ?> </td>
        </tr>
      </table>

    </div>
  </div>
</body>

</html>