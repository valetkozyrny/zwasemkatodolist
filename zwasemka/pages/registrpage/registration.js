class SimpleFormValidation {
    constructor(formSelector) {
        this.form = document.querySelector(formSelector);
        if (!this.form) return;

        this.bindEvents();
    }

    bindEvents() {
        this.form.addEventListener("submit", (e) => this.onSubmit(e));
        this.form.querySelectorAll("input, textarea").forEach(field => {
            field.addEventListener("blur", () => this.validateField(field));
        });
    }

    validateField(field) {
        let errors = [];

        if (field.required && !field.value.trim()) {
            errors.push("This field is required.");
        }

        if (field.minLength > 0 && field.value.length < field.minLength) {
            errors.push(`Minimum length: ${field.minLength}`);
        }

        if (field.maxLength > 0 && field.value.length > field.maxLength) {
            errors.push(`Maximum length: ${field.maxLength}`);
        }

        if (field.type === "password" && field.pattern) {
            const regex = new RegExp(field.pattern);
            if (!regex.test(field.value)) {
                errors.push("Invalid password format.");
            }
        }

        this.showErrors(field, errors);
        return errors.length === 0;
    }

    showErrors(field, errors) {
        const box = field.parentElement.querySelector("[data-js-form-field-errors]");
        if (!box) return;

        if (errors.length === 0) {
            box.innerHTML = "";
        } else {
            box.innerHTML = errors.map(err => `<span class="field__error">${err}</span>`).join("");
        }
    }

    onSubmit(event) {
        let valid = true;

        [...this.form.elements].forEach(el => {
            if (el.required) {
                if (!this.validateField(el)) {
                    valid = false;
                }
            }
        });

        if (!valid) {
            event.preventDefault();
        }
    }
}

new SimpleFormValidation("#regForm");
