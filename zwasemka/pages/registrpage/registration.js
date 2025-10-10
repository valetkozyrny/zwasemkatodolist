class FormsValidation {
    selectors = {
        form: '[data-js-form]'
        fieldErrors: '[data-js-form-field-errors'
    }

    constructor() {
        this.bindEvents()
    }
    onBlur(event) {
        const isFormField = event.target.closest(this.selectors.form)
        const isRequired = event.target.required
    }
    bindEvents(){
        document.addEventListener('blur', (event) => {
            console.log(event)
        }, { capture: true })
    }
}
new FormsValidation()