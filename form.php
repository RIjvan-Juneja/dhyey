<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
<form id="my-form" action="insert.php" method="post">
  <input type="text" name="firstname" placeholder="Firstname" required>
  <input type="text" name="lastname" placeholder="Lastname" required>
  <input type="email" name="email" placeholder="Email" required>
  <select name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>
  <input type="date" name="dob" required>
  <div>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Music"> Music
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports
    <input type="checkbox" name="hobbies[]" value="Other"> Other
  </div>
  <input type="submit" value="Submit">
</form>
<script>
    $(document).ready(function() {
  $("#my-form").validate({
    rules: {
      firstname: {
        required: true,
      },
      lastname: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      gender: {
        required: true,
      },
      dob: {
        required: true,
      },
      "hobbies[]": {
        required: true,
      },
    },
    messages: {
      firstname: {
        required: "Please enter your first name.",
      },
      lastname: {
        required: "Please enter your last name.",
      },
      email: {
        required: "Please enter your email address.",
        email: "Please enter a valid email address.",
      },
      gender: {
        required: "Please select your gender.",
      },
      dob: {
        required: "Please enter your date of birth.",
      },
      "hobbies[]": {
        required: "Please select at least one hobby.",
      },
    },
  });
});

</script>
</body>
</html>
