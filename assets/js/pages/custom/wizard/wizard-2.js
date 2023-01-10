"use strict";

// Class definition
var KTWizard2 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						// KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							// KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			// KTUtil.scrollTop();
		});

		// Submit event
		/*
		_wizardObj.on('submit', function (wizard) {

				Swal.fire({
					text: "Confirme el envío del cuestionario.",
					icon: "success",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Si, enviar",
					cancelButtonText: "No, cancelar",
					customClass: {
						confirmButton: "btn font-weight-bold btn-primary mr-5",
						cancelButton: "btn font-weight-bold btn-danger ml-5"
					}
				}).then(function (result) {
					if (result.value) {

						// _formEl.submit(); // Submit form
						console.log('Comprobar todos los campos requeridos');
						 
						 
						  var value = $('.requerido').filter(function () {
						    return this.value != '';
						  });

						  if (value.length == 0) {
						  	console.log('this.length: '+this.length);
						    toastr.error('Please fill out all required fields.');
						  } else if (value.length > 0) {
						  	console.log('this.length: '+this.length);
						    toastr.info('Everything has a value.');
						  }
						  

					} else if (result.dismiss === 'cancel') {
						Swal.fire({
							text: "No se ha enviado el cuestionario.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						});
					}
				});

		});
		*/
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					estudioscuartonivel: {
						validators: {
							notEmpty: {
								message: 'Campo requerido'
							}
						}
					},
					lname: {
						validators: {
							notEmpty: {
								message: 'Last Name is required'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Phone is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					address1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					postcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					city: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					state: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					country: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					delivery: {
						validators: {
							notEmpty: {
								message: 'Delivery type is required'
							}
						}
					},
					packaging: {
						validators: {
							notEmpty: {
								message: 'Packaging type is required'
							}
						}
					},
					preferreddelivery: {
						validators: {
							notEmpty: {
								message: 'Preferred delivery window is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					locaddress1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					locpostcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					loccity: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					locstate: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					loccountry: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 5
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					ccname: {
						validators: {
							notEmpty: {
								message: 'Credit card name is required'
							}
						}
					},
					ccnumber: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},
					ccmonth: {
						validators: {
							notEmpty: {
								message: 'Credit card month is required'
							}
						}
					},
					ccyear: {
						validators: {
							notEmpty: {
								message: 'Credit card year is required'
							}
						}
					},
					cccvv: {
						validators: {
							notEmpty: {
								message: 'Credit card CVV is required'
							},
							digits: {
								message: 'The CVV value is not valid. Only numbers is allowed'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 6
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					ccname: {
						validators: {
							notEmpty: {
								message: 'Credit card name is required'
							}
						}
					},
					ccnumber: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},
					ccmonth: {
						validators: {
							notEmpty: {
								message: 'Credit card month is required'
							}
						}
					},
					ccyear: {
						validators: {
							notEmpty: {
								message: 'Credit card year is required'
							}
						}
					},
					cccvv: {
						validators: {
							notEmpty: {
								message: 'Credit card CVV is required'
							},
							digits: {
								message: 'The CVV value is not valid. Only numbers is allowed'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidation();
		}
	};
}();

function requeridoTinymce(){
	console.log('entro a requeridoTinymce');
}

var p = $('#p').val(); //id del programa
var c = $('#c').val(); // cedula del postulante
var contenido = 0;
var KTTinymce = function () {
    // Private functions

    var textareas = function () {
        tinymce.init({
            selector: 'textarea',
            plugins : 'save',
            language: 'es',
            menubar: false,
            setup: function(editor) {
		        editor.on('change', function(e) {
		        	contenido = tinymce.activeEditor.getContent(); //Contenido del textarea

		        	if (contenido == '') {
		        		//Actualizo el campo que controla la clase de requerido
		            	$('#'+this.id+'-req').val('');
		        	}else{
		        		//Actualizo el campo que controla la clase de requerido
		            	$('#'+this.id+'-req').val('1');
		        	}
		        	
		        	//Guardo el resultado en la BD
		            actualizarDatos( this.id, p, c, contenido);
		            
		        });
		    }
     	//  oninit : addClass
        });

    }

    /*
	    var otrosestudioscuartonivel = function () {
	        tinymce.init({
	            selector: '#otrosestudioscuartonivel',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var estudiostercernivel = function () {
	        tinymce.init({
	            selector: '#estudiostercernivel',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var laborempresa = function () {
	        tinymce.init({
	            selector: '#laborempresa',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var incentivopostulacion = function () {
	        tinymce.init({
	            selector: '#incentivopostulacion',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }
	    
	    var carreraprofesional = function () {
	        tinymce.init({
	            selector: '#carreraprofesional',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var impactocarrera = function () {
	        tinymce.init({
	            selector: '#impactocarrera',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var capacitaciones = function () {
	        tinymce.init({
	            selector: '#capacitaciones',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var idiomas = function () {
	        tinymce.init({
	            selector: '#idiomas',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var experienciadocencia = function () {
	        tinymce.init({
	            selector: '#experienciadocencia',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var publicacionesrevistas = function () {
	        tinymce.init({
	            selector: '#publicacionesrevistas',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var libros = function () {
	        tinymce.init({
	            selector: '#libros',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }

	    var participacioneventos = function () {
	        tinymce.init({
	            selector: '#participacioneventos',
	            plugins : 'save',
	            language: 'es',
	            menubar: false,
	        });
	    }
    */

    return {
        // public functions
        init: function() {
            textareas();
            /*
	            otrosestudioscuartonivel();
	            estudiostercernivel();
	            laborempresa();
	            incentivopostulacion();
	            carreraprofesional();
	            impactocarrera();
	            capacitaciones();
	            idiomas();
	            experienciadocencia();
	            publicacionesrevistas();
	            libros();
	            participacioneventos();
            */
        }
    };
}();

jQuery(document).ready(function () {
	KTWizard2.init();
	KTTinymce.init();
	//inicio();
});

function inicio(){
	$.confirm({
	   title: 'Información',
    	content: 'Preparando documento.',
    	autoClose: 'logoutUser|3000',
	    buttons: {
	        logoutUser: {
	            text: 'Espere por favor... ',
	            action: function () {
	                jQuery('.tox-tinymce').addClass('form-control');
	            }
	        }
	    }
	});
}
