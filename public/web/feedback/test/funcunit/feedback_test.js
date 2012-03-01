steal("funcunit", function(){
	module("feedback test", { 
		setup: function(){
			S.open("//feedback/feedback.html");
		}
	});
	
	test("Copy Test", function(){
		equals(S("h1").text(), "Welcome to JavaScriptMVC 3.2!","welcome text");
	});
})