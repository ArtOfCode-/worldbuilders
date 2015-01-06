function wbUtils() {
	this.wbPlatformVersion = "0.9.2d1 alpha (build 310)";
	
	this.disableTooltips = function() {
		$("a").hover(function() {
			if($(this).attr("title")) {
				var $this = $(this);
				$this.attr("data-title", $this.attr("title"));
				$this.attr("title", "");
			}
		}, function() {
			var $this = $(this);
			if($this.attr("data-title")) {
				$this.attr("title", $this.attr("data-title"));
				$this.attr("data-title", "");
			}
		});
	};
	
	this.addMessageHandlers = function() {
		$(".message").on("click", function() {
			$(this).fadeOut(1000);
		});
	};
	
}