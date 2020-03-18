/**
 * A simple error handler class that helps displaying and removing error messages
 * in the forms or in other parts of the system.
 */
export class FormError {

    /**
     * Creates the instance of the Form error handler for Laravel validation.
     *
     * @param {[array]} errors Errors object from Laravel validation
     */
    constructor(errors) {
        this.errors = errors;
    }

    /**
     * Determines if an error exists
     *
     * @param  {[string]}  field The key index of the error
     * @return {Boolean}
     */
    has(field) {
        return field in this.errors;
    }

    /**
     * Returns the first message of an error, empty string if none found.
     *
     * @param  {[string]} field The key index of the error
     * @return {[string]} The error message
     */
    first(field) {
        let err = '';
        if(this.has(field)) {
            return this.errors[field][0];
        }
        return err;
    }

    /**
     *  Removes the error from the error list
     *
     * @param {[type]} field The key index of the error
     */
    reset(field) {
        delete this.errors[field];
    }
}
