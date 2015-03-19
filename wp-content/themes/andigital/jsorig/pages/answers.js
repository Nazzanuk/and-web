Feature.defaultImageHeight = 1200;
Feature.heightPercentage = 0.85;
Feature.scaleToFit = false;
$(function(){
	$(".delete-answer-button").each(function(index, button) {
		$(button).click(function() {
			if (confirm('Confirm delete?')) {
				return true;
			}
			return false;
		});
	});
}); 