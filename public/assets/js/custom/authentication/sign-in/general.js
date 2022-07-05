"use strict";
var KTSigninGeneral = function() {
    var t, e, i;
    return {
        init: function() {
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Email / Username is harus diisi"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Password is harus diisi"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), e.addEventListener("click", (function(n) {
                n.preventDefault(), i.validate().then((function(i) {
                    if("Valid" == i){
                        let formData = new FormData(t)
                        axios.post(t.action, formData).then(response => {
                            let message = response.data.message
                            toastr.success(message, "Success")

                            setTimeout(() => {
                                window.location.replace(response.data.redirect);
                            }, 1000);
                        }).catch(response => {
                            let errors = response.response.data.errors ?? {}

                            if(errors.length > 0){
                                for (let [key, values] of Object.entries(errors)) {
                                    values.forEach(value => {
                                        toastr.error(value, "Error")
                                    });
                                }
                            }else{
                                Swal.fire({
                                    text: response.response.data.message,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })
                            }
                        })
                    }else {
                        Swal.fire({
                            text: "Mohon maaf, ada beberapa kesalahan dalam mengisi form. Mohon coba lagi.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSigninGeneral.init()
}));