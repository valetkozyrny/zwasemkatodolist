class RegistrationForm {
    constructor() {
        this.form = document.querySelector('[data-js-form]');
        if (!this.form) return;

        this.bindEvents();
    }

    bindEvents() {
        this.form.addEventListener('submit', (e) => this.onSubmit(e));
    }

    showError(input, message) {
        const box = input.parentElement.querySelector('[data-js-form-field-errors]');
        if (!box) return;

        box.innerHTML = `<span class="field__error">${message}</span>`;
        input.setAttribute('aria-invalid', 'true');
    }

    clearErrors() {
        [...this.form.elements].forEach(el => {
            el.removeAttribute('aria-invalid');
            let box = el.parentElement.querySelector('[data-js-form-field-errors]');
            if (box) box.innerHTML = '';
        });
    }

    validateField(input) {
        const value = input.value.trim();
        const id = input.id;

        // Required fields
        if (input.required && value === '') {
            this.showError(input, 'This field is required');
            return false;
        }

        // Email
        if (id === 'email') {
            if (!value.includes('@') || !value.includes('.')) {
                this.showError(input, 'Invalid email format');
                return false;
            }
        }

        // Password pattern validation
        if (id === 'password') {
            const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/;
            if (!pattern.test(value)) {
                this.showError(input, 'Password must contain uppercase, lowercase, number (8–16 chars)');
                return false;
            }
        }

        return true;
    }

    validateForm() {
        this.clearErrors();

        let isValid = true;

        [...this.form.elements].forEach(input => {
            if (input.required && !this.validateField(input)) {
                isValid = false;
            }
        });

        // gender (radio)
        const gender = this.form.querySelector('input[name="gender"]:checked');
        if (!gender) {
            const box = this.form.querySelector('#gender-errors');
            box.innerHTML = `<span class="field__error">Please select gender</span>`;
            isValid = false;
        }

        // checkbox
        const agreement = this.form.querySelector('#agreement');
        if (!agreement.checked) {
            const box = agreement.parentElement.querySelector('[data-js-form-field-errors]');
            box.innerHTML = `<span class="field__error">You must agree</span>`;
            isValid = false;
        }

        return isValid;
    }

    async onSubmit(e) {
        e.preventDefault();

        if (!this.validateForm()) return;

        const formData = new FormData(this.form);
        const submitBtn = this.form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        try {
            const response = await fetch('/zwasemka/pages/registrpage/pub.php', {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            console.log('Server response:', text);

            // Поскольку твой pub.php возвращает просто текст — считаем успехом всё.
            alert("Registration successful!");
            window.location.href = '/zwasemka/pages/mainpage/mainpage.php';

        } catch (error) {
            console.error(error);
            alert("Server error");
        }

        submitBtn.disabled = false;
    }
}

new RegistrationForm();
