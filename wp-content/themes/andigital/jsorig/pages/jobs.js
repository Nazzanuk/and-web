//----------------------------------------------------------------------------------------------------
//job
//----------------------------------------------------------------------------------------------------
var DevJob = {};
var styles = {
	text: "color: #1b1e24",
	logo: "color: #d93621; font-weight: bold"
};

DevJob.init = function(){
	if(console){
		if(console.log){
			console.log("%cANDigital%c - Are you a developer looking for an exciting new role in London? --> yes() || no();", styles.logo, styles.text);
		}
	}
}

function no(){
	console.log('Are you sure? We have exciting opportunity for developers to join our team in the heart of Covent Garden. --> tellMeMore()');
	return '';
}

function tellMeMore(){
	console.log('How many years experience do you have in HTML, JavaScript, CSS? --> answer(num_of_years)');

	return '';
}

function yes(){
	console.log('How many years experience do you have in HTML, JavaScript, CSS? --> answer(num_of_years)');

	return '';
}

function answer(numOfYears){
	if(numOfYears <= 2){
		console.log(numOfYears + ' years, great! We have a role that\'s just right for you.');
		setTimeout(function(){
			window.location = 'http://andigital.gradquiz.com'
		},4000)
	}else{
		console.log(numOfYears + ' years, great! We have a role that\'s just right for you.');
		setTimeout(function(){
			window.location = './product-developer'
		},4000)
	}
	return '';
}

$(function() {
	//DevJob.init();
});
