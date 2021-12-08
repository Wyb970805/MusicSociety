<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Feedback</title>
    <style>
        .detail{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .container {
            display: inline;
            position: relative;
            cursor: pointer;
            user-select: none;
        }
        .container input{
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .checkmark{
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 50%;
        }
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }
        .container input:checked ~ .checkmark {
            background-color: #dd99ff;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .container input:checked ~ .checkmark:after {
            display: block;
        }
        .container .checkmark:after {
            top: 7px;
            left: 7px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: white;
        }
        .t{
            border-radius: 4px;
            display: inline-block;
        }
        .c {
            text-align: center;
            font-size: 300%;
        }
        h4 {
            text-align: center; 
        }
        .form{
            margin: 100px 300px;
            border: 1px solid #808080;
            padding: 50px;
        }
        table{
            width: 60%
        }
        .sub{
            float: right;
        }
        
    </style>
  </head>
  <?php include 'header.php'; ?>
  <div class="c">Feedback Form</div><br>
  <h4>We would love to hear from you!  Let us know your thoughts, concerns or problems with anything so we can improve.</h4>
<div class="form">
    <form action="feedbacksubmit.php">
      <p><span style="font-size: 120%">Feedback Type </span><span style="color:red">* </span> </p>
            <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;Comments
                <input type="radio"  name="radio" required>
                <span class="checkmark"></span>
            </label>
            <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;Questions
                <input type="radio"  name="radio" required>
                <span class="checkmark"></span>
            </label>
            <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;Bug Reports
                <input type="radio" name="radio" required>
                <span class="checkmark"></span>
            </label>
    <p><br><span style="font-size: 120%">Feedback Description: </span></p>
    <textarea class="t" rows="5" cols="60"></textarea>
    <br><br>
    <table>
        <tr>
            <td><span style="font-size: 120%">First Name </span><span style="color:red">* </span></td>
            <td><input type="text" class="detail" placeholder="First Name" required></td>
        </tr>
        <tr>
            <td><span style="font-size: 120%">Last Name </span><span style="color:red">* </span></td>
            <td><input type="text" class="detail" placeholder="Last Name" required></td>
        </tr>
        <tr>
            <td><span style="font-size: 120%">Phone Number </span></td>
            <td><input type="text" class="detail" placeholder="01x-xxxx xxxx"></td>
        </tr>
        <tr>
            <td><span style="font-size: 120%">Email Address </span><span style="color:red">* </span></td>
            <td><input type="text" class="detail" placeholder="abc123@gmail.com" required></td>
        </tr>
    </table>
    <br>
    <input class="sub" type="submit">
    <p><span style="color:red">*</span><span style="font-size: 90%">required</span></p>
    </form>
</div>

</body>
<?php include 'footer.php'; ?>
</html>


