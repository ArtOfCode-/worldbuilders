$(document).ready(function() {
	
	var siteUtils = new wbUtils();
	
	siteUtils.disableTooltips();
	siteUtils.addMessageHandlers();
	
	console.log("Hello there, fellow developer!");
	console.log("Running Worldbuilders platform " + siteUtils.wbPlatformVersion);	
	
	$(".content").after("<span class='dev-info'>Site in development: version number " + siteUtils.wbPlatformVersion + "</span>");
});