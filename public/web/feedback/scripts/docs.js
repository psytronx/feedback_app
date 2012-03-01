//js feedback/scripts/doc.js

load('steal/rhino/rhino.js');
steal("documentjs").then(function(){
	DocumentJS('feedback/feedback.html', {
		markdown : ['feedback']
	});
});