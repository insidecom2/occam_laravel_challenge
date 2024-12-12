const userEditForm = document.getElementById("userEditForm");
const fv = FormValidation.formValidation(userEditForm, {
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: "Please enter name ",
                },
            },
        },
        email: {
            validators: {
                notEmpty: {
                    message: "Please enter your email",
                },
                emailAddress: {
                    message: "The value is not a valid email address",
                },
            },
        },
    },
    plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            eleValidClass: "",
            rowSelector: function (field, ele) {
                // field is the field name & ele is the field element
                return ".mb-3";
            },
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus(),
    },
});
