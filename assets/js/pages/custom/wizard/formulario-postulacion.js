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
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_fomrulario_postulacion');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
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
