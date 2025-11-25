<?php
require_once "../../includes/header.php";

?>
<form id="regForm" action="/zwasemka/pages/registrpage/pub.php" method="post" novalidate data-js-form>
    <h4> Registration </h4>
    <p class="field">
        <label class="field__label" for="email">Email</label>
        <input
                class="field__control"
                id="email"
                name="email"
                required
                minlength="3"
                maxlength="30"
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
<?php
include "../../includes/footer.php";
?>