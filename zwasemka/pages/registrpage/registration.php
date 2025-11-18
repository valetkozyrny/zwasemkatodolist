<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="registration.css">
    <script src="registration.js" defer></script>
    <title>Registration</title>
</head>
<body>
<form id="regForm" action="/registration" method="post" novalidate data-js-form>
    <h4> Registration </h4>
    <p class="field">
        <label class="field__label" for="email">Email</label>
        <input
                class="field__control"
                id="email"
                name="email"
                required
                minlength="3"
                maxlength="18"
                aria-errormessage="email-errors"
        />
        <span class="field__errors" id="email-errors" data-js-form-field-errors></span>
    </p>
    <p class="field">
        <label class="field__label" for="password">Password</label>
        <input
                class="field__control"
                id="password"
                name="password"
                type="text"
                required
                minlength="8"
                maxlength="16"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}"
                aria-errormessage="password-errors"
        />
        <span class="field__errors" id="password-errors" data-js-form-field-errors></span>
    </p>
    <p class="field">
        <label class="field__label" for="about">About me</label>
        <textarea class="field__control" id="about" name="about"></textarea>
    </p>
    <fieldset class="radios">
        <legend class="radios__legend">Your gender</legend>

        <input
                class="radios__control"
                id="male"
                name="gender"
                type="radio"
                value="Male"
                required
                aria-errormessage="gender-errors"
        />
        <label class="radios__label" for="male">Male</label>

        <input
                class="radios__control"
                id="female"
                name="gender"
                type="radio"
                value="Female"
                required
                aria-errormessage="gender-errors"
        />
        <label class="radios__label" for="female">Female</label>

        <span class="field__errors" id="gender-errors" data-js-form-field-errors></span>
    </fieldset>
    <div class="field checkbox">
        <input
                class="checkbox__control"
                id="agreement"
                name="agreement"
                type="checkbox"
                required
                aria-errormessage="agreement-errors"
        />
        <label class="field__label checkbox__label" for="agreement">Agree with all</label>
        <span class="field__errors" id="agreement-errors" data-js-form-field-errors></span>
    </div>
    <button type="submit">Sign up</button>
</form>
</body>
</html>