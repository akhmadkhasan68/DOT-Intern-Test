"use strict";

var KTSignupGeneral = function() {
    var e, t, a, s, r = function() {
        return 100 === s.getScore()
    };
    return {
        init: function() {
            e = document.querySelector("#kt_sign_up_form"), t = document.querySelector("#kt_sign_up_submit"), s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]')), a = FormValidation.formValidation(e, {
                fields: {
                    "name": {
                        validators: {
                            notEmpty: {
                                message: "Nama harus diisi"
                            }
                        }
                    },
                    "username": {
                        validators: {
                            notEmpty: {
                                message: "Username harus diisi"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "E-Mail harus diisi"
                            },
                            emailAddress: {
                                message: "E-Mail tidak valid"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Password harus diisi"
                            },
                            callback: {
                                message: "Mohon masukkan password yang valid",
                                callback: function(e) {
                                    if (e.value.length > 0) return r()
                                }
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "Konfirmasi Password harus diisi"
                            },
                            identical: {
                                compare: function() {
                                    return e.querySelector('[name="password"]').value
                                },
                                message: "Konfirmasi Password tidak sama dengan Password"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(r) {
                r.preventDefault(), a.revalidateField("password"), a.validate().then((function(a) {
                    if(a == "Valid"){
                        let formData = new FormData(e)
                        axios.post(e.action, formData).then(response => {
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
                            } else {
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
                    } else {
                        Swal.fire({
                            text: "Mohon maaf, ada beberapa kesalahan dalam mengisi form. Mohon coba lagi.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }))
            })), e.querySelector('input[name="password"]').addEventListener("input", (function() {
                this.value.length > 0 && a.updateFieldStatus("password", "NotValidated")
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSignupGeneral.init()
}));