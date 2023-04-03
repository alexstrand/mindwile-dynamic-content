// "use strict";

// // Variables
// var userRank = getCookie('imqtseg') ? (getCookie('imqtseg') / 100) - 1 : 'default';
// var validContent;
// var request = new XMLHttpRequest();
// request.open('GET', '/wp-json/wp/v2/personlized_content', true);

// //console.log(userRank);

// // Get JSON from Rest API & replace texts
// request.onload = function () {
// 	if (this.status >= 200 && this.status < 400) {
// 		// Success!
// 		var data = JSON.parse(this.response);

// 		if (data) {
// 			data.forEach(function(element, index) {
// 				var targets = document.getElementsByClassName('pc-' + element.slug);
				
// 				//console.log(element.acf);
				
// 				// userRank check
// 				if (userRank === 'default') {
// 					validContent = element.acf.default_text;
// 				} else {
// 					setTimeout(function() {
// 					if (userRank in element.acf.personalized_content) {
// 						if (element.acf.personalized_content[userRank].personlized_text) {
// 							validContent = element.acf.personalized_content[userRank].personlized_text;
// 						} else {
// 							getFallbackContent(element.acf.personalized_content);
// 						}
// 					} else {
// 						getFallbackContent(element.acf.personalized_content);
// 					}
// 				}, 1);	
// 				}
				
// 				// Replace shortcode html with personalized content
// 				Array.prototype.forEach.call(targets, function(element) {
// 					setTimeout(function() { // TEMP!!!
// 						element.replaceWith(validContent);
// 					}, 1);
// 				});
// 			});	
// 		}
// 	} else {
// 		console.log("Error with rest API.");
// 	}
// };

// request.onerror = function () {
//   // There was a connection error of some sort
// };

// request.send();

// function getFallbackContent(acfArray) {
// 	acfArray.forEach(function(element, index) {
// 		if (element.personlized_text) {
// 			validContent = element.personlized_text;	
// 		}
// 	});
// }

// function getCookie(name) {
// 	const value = `; ${document.cookie}`;
// 	const parts = value.split(`; ${name}=`);
// 	if (parts.length === 2) return parts.pop().split(';').shift();
// }

