class FormsValidation {

    selectors = {
        form: '[data-js-form]',
        fieldErrors: '[data-js-form-field-errors]',
    }
    errorMessages = {
        valueMissing: () => 'Please, blank this field ',
        patternMismatch:({ title }) => title || 'Error from invalid format ',
        tooShort:({ minLength }) => `Too short field - minimum:   ${minLength}` ,
        tooLong: ({ maxLength }) => `Too long field -  maximum:   ${maxLength}`,
    }


    constructor() {
        this.bindEvents()
    }
    manageErrors(fieldControlElement, errorMessages){
        const fieldErrorsElement = fieldControlElement.parentElement.querySelector(this.selectors.fieldErrors)

        fieldErrorsElement.innerHTML = errorMessages
            .map((message) => `<span class = "field__error">${message}</span>`)
            .join('')
        if (errorMessages.length > 0) {
            fieldControlElement.parentElement.classList.add("has-error");
        } else {
            fieldControlElement.parentElement.classList.remove("has-error");
        }

    }



    validateField(fieldControlElement) {
        const errors = fieldControlElement.validity
        const errorMessages = []


        Object.entries(this.errorMessages).forEach(([errorType, getErrorMessage]) => {
            if (errors[errorType]) {
                errorMessages.push(getErrorMessage(fieldControlElement))
            }
        })

    this.manageErrors(fieldControlElement, errorMessages)
    const isValid = errorMessages.length === 0
    fieldControlElement.ariaInvalid = !isValid

    return isValid
    }

    onBlur(event) {
        const { target } = event
        const isFormField = event.target.closest(this.selectors.form)
        const isRequired = event.target.required

        if (isFormField && isRequired){
            this.validateField(target)
        }
    }
    onChange(event){
        const { target } = event
        const isRequired = event.target.required
        const isToggleType = ['radio', 'checkbox'].includes(event.target.type)
        if (isToggleType && isRequired){
            this.validateField(event.target)
        }
    }

    onSubmit(event) {
        const isFormElement = event.target.matches(this.selectors.form)

        if (!isFormElement){
            return
        }
        const requiredControlElements = [...event.target.elements].filter(({ required }) => required)
        let isFormValid = true

        requiredControlElements.forEach((element) => {
            const isFieldValid = this.validateField(element)
            if (!isFieldValid){
                isFormValid = false
            }
        })
        if (!isFormValid){
            event.preventDefault()
        }

    }





    bindEvents(){

        document.addEventListener('blur', (event) => {
            this.onBlur(event)
        }, { capture: true })
        document.addEventListener('change', (event) => this.onChange(event))
        document.addEventListener('submit', (event) => this.onSubmit(event))

    }
}
new FormsValidation()