<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <script src="registration.js" defer ></script>
    <link rel="stylesheet" href="registration.css">
</head>
<title></title>
<body>
<h4><b>Registration page</b></h4>
<form id="registrForm">
    <label for="email">Username:</label>
    <input type="text" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="password-again">Password again:</label>
    <input type="password" id="password-again" name="password-again" required>

    <label for="gender">Select your gender:</label>
    <select id="gender" name="gender" required>
        <option value="" disabled selected>-- Select --</option>
        <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="nonbinary">Non-binary</option>
        <option value="transgender">Transgender</option>
        <option value="genderqueer">Genderqueer</option>
        <option value="agender">Agender</option>
        <option value="bigender">Bigender</option>
        <option value="genderfluid">Genderfluid</option>
        <option value="two-spirit">Two-Spirit</option>
        <option value="Stas-pidaras ">Stas-pidaras</option>
    </select>

    <label class="checkbox-container">
        I agree to the <a href="https://www.youtube.com/watch?v=3BFTio5296w&list=RD3BFTio5296w&start_radio=1" target="_blank">Terms of Service</a>
        <input type="checkbox" required>
        <span class="checkmark"></span>
    </label>





    <button type="submit">Sign up</button>
</form>


</body>
</html>
