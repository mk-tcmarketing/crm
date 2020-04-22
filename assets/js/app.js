/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

$(function(){
	var loginInput = $('.form-control.form-input input');
	if(loginInput.length > 0){
		loginInput.each(function(){
			
			if($(this).val() != '' && $(this).val() != undefined){
				console.log('AddClass')
				$(this).closest('.form-control.form-input').addClass('hasValue');
			}

		});
		loginInput.on('input',function(){
			if($(this).val() != '' && $(this).val() != undefined){
				console.log('AddClass')
				$(this).closest('.form-control.form-input').addClass('hasValue');
			}else {
				$(this).closest('.form-control.form-input').removeClass('hasValue');
			}
		});
	}
});

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
