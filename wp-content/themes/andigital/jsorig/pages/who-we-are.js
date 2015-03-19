var Keyboard = {};
Keyboard.init = function(){
	$(window).keyup(function(e){
		if (AdvisorBio.visible) {
			if (EmployeeBio.visible) {
				EmployeeBio.hide(false);
			}
			if(e.keyCode == 27){
				AdvisorBio.hide(true);
			}
			if(e.keyCode == 37){
				AdvisorBio.showPrevious();
			}
			if(e.keyCode == 39){
				AdvisorBio.showNext();
			}
		}
		if (EmployeeBio.visible) {
			if (AdvisorBio.visible) {
				AdvisorBio.hide(false);
			}
			if(e.keyCode == 27){
				EmployeeBio.hide(true);
			}
			if(e.keyCode == 37){
				EmployeeBio.showPrevious();
			}
			if(e.keyCode == 39){
				EmployeeBio.showNext();
			}
		}
	});
}

//----------------------------------------------------------------------------------------------------
//employees
//----------------------------------------------------------------------------------------------------
var Employees = {};
Employees.subfolder = 'midres/';
Employees.dir = 'our-people/' + Employees.subfolder;
Employees.employees = employees;

Employees.init = function(){
	for(var i=0; i<Employees.employees.length; i++){
		var employee = Employees.get(i);

		employee.element.mouseover(function(){
			Employees.mouseOver($(this).attr('dataId'));
		});

		employee.element.mouseout(function(){
			Employees.mouseOut($(this).attr('dataId'));
		});

		employee.element.click(function(){
			if (AdvisorBio.visible) {
				AdvisorBio.hide(false);
			}
			EmployeeBio.show($(this).attr('dataId'), true);
		});

		//set index
		Employees.employees[i].index = i;
	}

	$('.employee .image-2').fadeTo(0,0);
}

Employees.getIndexByID = function(id){
	var index = 0;
	for(var i=0; i<Employees.employees.length; i++){
		if(Employees.employees[i].id == id){
			index = i;
		}
	}

	return index;
}

Employees.getByID = function(id){
	var index = Employees.getIndexByID(id);
	var employee = Employees.get(index);

	return employee;
}

Employees.get = function(index){
	var employee = Employees.employees[index];
	if (employee) {
		employee.element = $('#employee-' + employee.id);
	}

	return employee;
}

Employees.mouseOver = function(id){
	var employee = Employees.getByID(id);
	employee.element.find('.image-2').stop().fadeTo(500,1);
}

Employees.mouseOut = function(id){
	var employee = Employees.getByID(id);
	employee.element.find('.image-2').stop().fadeTo(500,0);
}

Employees.resize = function(){
	$('#employee-list').width(Site.width - 10);
}

Employees.loadHiResImages = function(){
	$('#employee-list').find('img').each(function(index, element) {
		var regexp = /(.*)\/lowres\/(.*)/g;
		var results = regexp.exec($(element).attr('src'));
		if (results.length == 3) {
			$(element).attr('src', results[1] + '/' + Employees.subfolder + results[2]);
		}
	});
}

//----------------------------------------------------------------------------------------------------
//advisors
//----------------------------------------------------------------------------------------------------
var Advisors = {};
Advisors.subfolder = 'midres/';
Advisors.dir = 'advisory-board/' + Advisors.subfolder;
Advisors.advisors = advisors;

Advisors.init = function(){
	for(var i=0; i<Advisors.advisors.length; i++){
		var advisor = Advisors.get(i);

		advisor.element.mouseover(function(){
			Advisors.mouseOver($(this).attr('dataId'));
		});

		advisor.element.mouseout(function(){
			Advisors.mouseOut($(this).attr('dataId'));
		});

		advisor.element.click(function(){
			if (EmployeeBio.visible) {
				EmployeeBio.hide(false);
			}
			AdvisorBio.show($(this).attr('dataId'), true);
		});

		//set index
		Advisors.advisors[i].index = i;
	}

	$('.advisor .image-2').fadeTo(0,0);
}

Advisors.getIndexByID = function(id){
	var index = 0;
	for(var i=0; i<Advisors.advisors.length; i++){
		if(Advisors.advisors[i].id == id){
			index = i;
		}
	}

	return index;
}

Advisors.getByID = function(id){
	var index = Advisors.getIndexByID(id);
	var advisor = Advisors.get(index);

	return advisor;
}

Advisors.get = function(index){
	var advisor = Advisors.advisors[index];
	if (advisor) {
		advisor.element = $('#advisor-' + advisor.id);
	}

	return advisor;
}

Advisors.mouseOver = function(id){
	var advisor = Advisors.getByID(id);
	advisor.element.find('.image-2').stop().fadeTo(500,1);
}

Advisors.mouseOut = function(id){
	var advisor = Advisors.getByID(id);
	advisor.element.find('.image-2').stop().fadeTo(500,0);
}

Advisors.resize = function(){
	$('#advisor-list').width(Site.width - 10);
}

Advisors.loadHiResImages = function(){
	$('#advisor-list').find('img').each(function(index, element) {
		var regexp = /(.*)\/lowres\/(.*)/g;
		var results = regexp.exec($(element).attr('src'));
		if (results.length == 3) {
			$(element).attr('src', results[1] + '/' + Advisors.subfolder + results[2]);
		}
	});
}

//----------------------------------------------------------------------------------------------------
//bio
//----------------------------------------------------------------------------------------------------
var EmployeeBio = {};
EmployeeBio.currentIndex = -1;
EmployeeBio.lastInColumnIndex = -1;
EmployeeBio.visible = false;
EmployeeBio.columnLength = 5;
EmployeeBio.columns2Min = 500;
EmployeeBio.columns4Min = 900;
EmployeeBio.defaultImageWidth = 1300;
EmployeeBio.defaultImageHeight = 1950;
EmployeeBio.ready = true;

EmployeeBio.init = function(){
}

EmployeeBio.html = function(id){
	var employee = Employees.getByID(id);

	var html = '';
	html += '<div id="employee-bio">';

	html += '<div id="employee-bio-photo">';
	html += '<img id="employee-bio-photo-img" src="' + Site.dir + '/img/who-we-are/' + Employees.dir + employee.id + '-3.jpg?v=' + version + '"/>';
	html += '</div>';

	html += '<div id="employee-bio-details">';
	html += '<h3 id="employee-bio-name"><label>' + employee.name + '</label></h3>';
	html += '<div class="underline-3"></div>';
	html += '<h3 id="employee-bio-title">' + employee.title + '</h3>';

	//html += '<p id="employee-bio-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. END</p>';
	html += '<div id="employee-bio-text">';
	html += '<h4>Career Background</h4>';
	html += '<p id="employee-bio-career-background"></p>';

	html += '<div id="employee-bio-role-container">';
	html += '<h4>Role</h4>';
	html += '<p id="employee-bio-role"></p>'
	html += '</div>';

	html += '<h4>Superhero Power</h4>';
	html += '<p id="employee-bio-super-hero-power"></p>';
	html += '</div>';
	//html += '<br>';
	//html += '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>';
	html += '<div id="employee-bio-close">';
	html += '<img id="employee-bio-close-img" src="' + Site.dir + '/img/who-we-are/close-dark.png"/>';
	html += '</div>';

	html += '</div>';

	html += '<div class="clear"></div>';

	html += '</div>';

	return html;
}

EmployeeBio.updateHTML = function(id){
	var employee = Employees.getByID(id);
	$('#employee-bio-name label').html(employee.name);
	$('#employee-bio-title').html(employee.title);
	$('#employee-bio-photo-img').attr('src',Site.dir + 'img/who-we-are/' + Employees.dir + employee.id + '-3.jpg?v=' + version);
}

EmployeeBio.addMouseEvents = function(){
	$('#employee-bio-close').click(function() {
		EmployeeBio.hide(true);
	});
}

EmployeeBio.show = function(id, scroll){
	EmployeeBio.ready = false;
	var employee = Employees.getByID(id);
	var columns = Math.ceil(Employees.employees.length / EmployeeBio.columnLength);
	var column = Math.ceil((employee.index + 1) / EmployeeBio.columnLength);
	var lastInColumnIndex = (column * EmployeeBio.columnLength) - 1;
	if(lastInColumnIndex > Employees.employees.length - 1){
		lastInColumnIndex = Employees.employees.length - 1;
	}
	var lastColumnEmployee = Employees.get(lastInColumnIndex);

	if(lastInColumnIndex == EmployeeBio.lastInColumnIndex){
		EmployeeBio.currentIndex = employee.index;
		EmployeeBio.updateHTML(employee.id);
	}else{
		if(EmployeeBio.lastInColumnIndex != -1){
			EmployeeBio.hideBioText();
		}
	
		EmployeeBio.currentIndex = employee.index;
		EmployeeBio.lastInColumnIndex = lastInColumnIndex;
		lastColumnEmployee.element.after(EmployeeBio.html(employee.id));
		EmployeeBio.addMouseEvents();

		EmployeeBio.visible = true;
	}

	// bio data are loaded asynchronously so we have to scroll after data have been loaded
	EmployeeBio.loadBio(employee.id, function(employee) {
		EmployeeBio.showBioText(employee.id);
		EmployeeBio.updateImage();
		
		if(EmployeeBio.columnLength == 2){
			$('#employee-bio-close-img').attr('src',Site.dir + '/img/who-we-are/close-light.png');
		}else{
			$('#employee-bio-close-img').attr('src',Site.dir + '/img/who-we-are/close-dark.png');
		}

		if (scroll) {
			Site.scrollToHeader({target:'employee-bio',offset:-5,complete:function() {
				EmployeeBio.ready = true;			
			}});
		} else {
			EmployeeBio.ready = true;			
		}
	});
}

EmployeeBio.loadBio = function(id, callback){
	var employee = Employees.getByID(id);
	if(employee.hasOwnProperty('bio')){
		callback(employee);
	}else{
		if (!employee.loading) {
			employee.loading = true;
			$.getJSON(Site.dir + 'data/employees/' + employee.id + '.json',function(data){
				employee.bio = data;
				callback(employee);
				employee.loading = false;
			});
		}
	}
}

EmployeeBio.showBioText = function(id){
	var employee = Employees.getByID(id);
	$('#employee-bio-career-background').html(employee.bio.careerBackground);
	if (employee.bio.showRole) {
		$('#employee-bio-role').html(employee.bio.role);
		$('#employee-bio-role-container').show();
	} else {
		$('#employee-bio-role-container').hide();
	}
	$('#employee-bio-super-hero-power').html(employee.bio.superHeroPower);
}

EmployeeBio.showPrevious = function(){
	if(EmployeeBio.visible && EmployeeBio.ready){
		var previousIndex = EmployeeBio.currentIndex - 1;
		if(previousIndex != -1){
			var previousEmployee = Employees.get(previousIndex);
			EmployeeBio.show(previousEmployee.id, true);
		}
	}
}

EmployeeBio.showNext = function(){
	if(EmployeeBio.visible && EmployeeBio.ready){
		var nextIndex = Number(EmployeeBio.currentIndex) + 1;
		if(nextIndex != Employees.employees.length){
			var nextEmployee = Employees.get(nextIndex);
			EmployeeBio.show(nextEmployee.id, true);
		}
	}
}

EmployeeBio.hideBioText = function(){
	$('#employee-bio').remove();
	EmployeeBio.currentIndex = -1;
	EmployeeBio.lastInColumnIndex = -1;
}

EmployeeBio.hide = function(scroll){
	if(EmployeeBio.visible && EmployeeBio.ready){
		if (scroll) {
			var currentEmployee = Employees.get(EmployeeBio.currentIndex);
			Site.scrollToHeader({target:'employee-'+currentEmployee.id,offset:-5});
		}
		EmployeeBio.hideBioText();
		EmployeeBio.visible = false;
	}
}

EmployeeBio.updateImage = function(){
	var photo = {};
	photo.element = $('#employee-bio-photo');

	var photoIMG = {};
	photoIMG.element = $('#employee-bio-photo-img');

	var employee = Employees.get(EmployeeBio.currentIndex);
	if (employee && employee.bio) {
		if (photo.element.height() * EmployeeBio.defaultImageWidth / EmployeeBio.defaultImageHeight > photo.element.width()) {
			if (employee.bio.horizontalAlign == "center") {
				photoIMG.left = (photo.element.width() - photo.element.height() * EmployeeBio.defaultImageWidth / EmployeeBio.defaultImageHeight) / 2;
			} else if (employee.bio.horizontalAlign == "left") {
				photoIMG.left = 0;
			} else if (employee.bio.horizontalAlign == "right") {
				photoIMG.left = photo.element.width() - photo.element.height() * EmployeeBio.defaultImageWidth / EmployeeBio.defaultImageHeight;
			}
			// horizontalOffset has priority on horizontalAlign
			if (employee.bio.horizontalOffset) {
				photoIMG.left = (photo.element.width() - photo.element.height() * EmployeeBio.defaultImageWidth / EmployeeBio.defaultImageHeight) / 2;
				photoIMG.left += employee.bio.horizontalOffset * (photo.element.height() / EmployeeBio.defaultImageHeight);
			}
		}
		
		if (photo.element.width() * EmployeeBio.defaultImageHeight / EmployeeBio.defaultImageWidth > photo.element.height()) {
			if (photo.element.width() > photo.element.height()) {
				if (employee.bio.verticalAlign == "center") {
					photoIMG.top = (photo.element.height() - photo.element.width() * EmployeeBio.defaultImageHeight / EmployeeBio.defaultImageWidth) / 2;
				} else if (employee.bio.verticalAlign == "top") {
					photoIMG.top = 0;
				} else if (employee.bio.verticalAlign == "bottom") {
					photoIMG.top = photo.element.height() - photo.element.width() * EmployeeBio.defaultImageHeight / EmployeeBio.defaultImageWidth;
				}
				// verticalOffset has priority on verticalAlign
				if (employee.bio.verticalOffset) {
					// 1/3 of the image is positioned to 1/3 of the image container 
					photoIMG.top = (photo.element.height() - photo.element.width() * EmployeeBio.defaultImageHeight / EmployeeBio.defaultImageWidth) / 3;
					photoIMG.top += (employee.bio.verticalOffset * photo.element.width() / EmployeeBio.defaultImageWidth);
				}
			}
		}
		
		if(photoIMG.left > 0){
			photoIMG.left = 0;
		}
		
		if(photoIMG.top > 0){
			photoIMG.top = 0;
		}
		
		photoIMG.element.css('left',photoIMG.left);
		photoIMG.element.css('top',photoIMG.top);
	}
}

EmployeeBio.resize = function(){
	EmployeeBio.updateImage();
	//column length
	if(Site.width <= EmployeeBio.columns2Min){
		EmployeeBio.changeColumns(2);
	}else if(Site.width <= EmployeeBio.columns4Min){
		EmployeeBio.changeColumns(4);
	}else{
		EmployeeBio.changeColumns(5);
	}
}

EmployeeBio.changeColumns = function(value){
	if(EmployeeBio.columnLength != value){
		EmployeeBio.columnLength = value;
		if(EmployeeBio.visible){
			var employee = Employees.get(EmployeeBio.currentIndex);
			EmployeeBio.hide(false);
			EmployeeBio.show(employee.id, false);
		}
	}
}

//----------------------------------------------------------------------------------------------------
//bio
//----------------------------------------------------------------------------------------------------
var AdvisorBio = {};
AdvisorBio.currentIndex = -1;
AdvisorBio.lastInColumnIndex = -1;
AdvisorBio.visible = false;
AdvisorBio.columnLength = 4;
AdvisorBio.columns2Min = 900;
AdvisorBio.defaultImageWidth = 1860;
AdvisorBio.defaultImageHeight = 2100;
AdvisorBio.ready = true;

AdvisorBio.init = function(){
}

AdvisorBio.html = function(id){
	var advisor = Advisors.getByID(id);

	var html = '';
	html += '<div id="advisor-bio">';

	html += '<div id="advisor-bio-photo">';
	html += '<img id="advisor-bio-photo-img" src="' + Site.dir + '/img/who-we-are/' + Advisors.dir + advisor.id + '-2.jpg?v=' + version + '"/>';
	html += '</div>';

	html += '<div id="advisor-bio-details">';
	html += '<h3 id="advisor-bio-name"><label>' + advisor.name + '</label></h3>';
	html += '<div class="underline-3"></div>';
	html += '<h3 id="advisor-bio-title">' + advisor.title + '</h3>';

	//html += '<p id="advisor-bio-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. END</p>';
	html += '<div id="advisor-bio-text">';
	html += '<h4>Career Background</h4>';
	html += '<p id="advisor-bio-career-background"></p>';

	html += '<h4>Hobbies</h4>';
	html += '<p id="advisor-bio-hobbies"></p>';
	html += '</div>';
	//html += '<br>';
	//html += '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>';
	html += '<div id="advisor-bio-close">';
	html += '<img id="advisor-bio-close-img" src="' + Site.dir + '/img/who-we-are/close-dark.png"/>';
	html += '</div>';

	html += '</div>';

	html += '<div class="clear"></div>';

	html += '</div>';

	return html;
}

AdvisorBio.updateHTML = function(id){
	var advisor = Advisors.getByID(id);
	$('#advisor-bio-name label').html(advisor.name);
	$('#advisor-bio-title').html(advisor.title);
	$('#advisor-bio-photo-img').attr('src',Site.dir + 'img/who-we-are/' + Advisors.dir + advisor.id + '-2.jpg?v=' + version);
}

AdvisorBio.addMouseEvents = function(){
	$('#advisor-bio-close').click(function() {
		AdvisorBio.hide(true);
	});
}

AdvisorBio.show = function(id, scroll){
	AdvisorBio.ready = false;
	var advisor = Advisors.getByID(id);
	var columns = Math.ceil(Advisors.advisors.length / AdvisorBio.columnLength);
	var column = Math.ceil((advisor.index + 1) / AdvisorBio.columnLength);
	var lastInColumnIndex = (column * AdvisorBio.columnLength) - 1;
	if(lastInColumnIndex > Advisors.advisors.length - 1){
		lastInColumnIndex = Advisors.advisors.length - 1;
	}
	var lastColumnAdvisor = Advisors.get(lastInColumnIndex);

	if(lastInColumnIndex == AdvisorBio.lastInColumnIndex){
		AdvisorBio.currentIndex = advisor.index;
		AdvisorBio.updateHTML(advisor.id);
	}else{
		if(AdvisorBio.lastInColumnIndex != -1){
			AdvisorBio.hideBioText();
		}
	
		AdvisorBio.currentIndex = advisor.index;
		AdvisorBio.lastInColumnIndex = lastInColumnIndex;
		lastColumnAdvisor.element.after(AdvisorBio.html(advisor.id));
		AdvisorBio.addMouseEvents();

		AdvisorBio.visible = true;
	}

	// bio data are loaded asynchronously so we have to scroll after data have been loaded
	AdvisorBio.loadBio(advisor.id, function(advisor) {
		AdvisorBio.showBioText(advisor.id);
		AdvisorBio.updateImage();
		
		if(AdvisorBio.columnLength == 2){
			$('#advisor-bio-close-img').attr('src',Site.dir + '/img/who-we-are/close-light.png');
		}else{
			$('#advisor-bio-close-img').attr('src',Site.dir + '/img/who-we-are/close-dark.png');
		}

		if (scroll) {
			Site.scrollToHeader({target:'advisor-bio',offset:-5,complete:function() {
				AdvisorBio.ready = true;			
			}});
		} else {
			AdvisorBio.ready = true;			
		}
	});
}

AdvisorBio.loadBio = function(id, callback){
	var advisor = Advisors.getByID(id);
	if(advisor.hasOwnProperty('bio')){
		callback(advisor);
	}else{
		if (!advisor.loading) {
			advisor.loading = true;
			$.getJSON(Site.dir + 'data/advisors/' + advisor.id + '.json',function(data){
				advisor.bio = data;
				callback(advisor);
				advisor.loading = false;
			});
		}
	}
}

AdvisorBio.showBioText = function(id){
	var advisor = Advisors.getByID(id);
	$('#advisor-bio-career-background').html(advisor.bio.careerBackground);
	$('#advisor-bio-role').html(advisor.bio.role);
	$('#advisor-bio-hobbies').html(advisor.bio.hobbies);
}

AdvisorBio.showPrevious = function(){
	if(AdvisorBio.visible && AdvisorBio.ready){
		var previousIndex = AdvisorBio.currentIndex - 1;
		if(previousIndex != -1){
			var previousAdvisor = Advisors.get(previousIndex);
			AdvisorBio.show(previousAdvisor.id, true);
		}
	}
}

AdvisorBio.showNext = function(){
	if(AdvisorBio.visible && AdvisorBio.ready){
		var nextIndex = Number(AdvisorBio.currentIndex) + 1;
		if(nextIndex != Advisors.advisors.length){
			var nextAdvisor = Advisors.get(nextIndex);
			AdvisorBio.show(nextAdvisor.id, true);
		}
	}
}

AdvisorBio.hideBioText = function(){
	$('#advisor-bio').remove();
	AdvisorBio.currentIndex = -1;
	AdvisorBio.lastInColumnIndex = -1;
}

AdvisorBio.hide = function(scroll){
	if(AdvisorBio.visible && AdvisorBio.ready){
		if (scroll) {
			var currentAdvisor = Advisors.get(AdvisorBio.currentIndex);
			Site.scrollToHeader({target:'advisor-'+currentAdvisor.id,offset:-5});
		}
		AdvisorBio.hideBioText();
		AdvisorBio.visible = false;
	}
}

AdvisorBio.updateImage = function(){
	var photo = {};
	photo.element = $('#advisor-bio-photo');

	var photoIMG = {};
	photoIMG.element = $('#advisor-bio-photo-img');

	var advisor = Advisors.get(AdvisorBio.currentIndex);
	if (advisor && advisor.bio) {
		if (photo.element.height() * AdvisorBio.defaultImageWidth / AdvisorBio.defaultImageHeight > photo.element.width()) {
			if (advisor.bio.horizontalAlign == "center") {
				photoIMG.left = (photo.element.width() - photo.element.height() * AdvisorBio.defaultImageWidth / AdvisorBio.defaultImageHeight) / 2;
			} else if (advisor.bio.horizontalAlign == "left") {
				photoIMG.left = 0;
			} else if (advisor.bio.horizontalAlign == "right") {
				photoIMG.left = photo.element.width() - photo.element.height() * AdvisorBio.defaultImageWidth / AdvisorBio.defaultImageHeight;
			}
			// horizontalOffset has priority on horizontalAlign
			if (advisor.bio.horizontalOffset) {
				photoIMG.left = (photo.element.width() - photo.element.height() * AdvisorBio.defaultImageWidth / AdvisorBio.defaultImageHeight) / 2;
				photoIMG.left += advisor.bio.horizontalOffset * (photo.element.height() / AdvisorBio.defaultImageHeight);
			}
		}
		
		if (photo.element.width() * AdvisorBio.defaultImageHeight / AdvisorBio.defaultImageWidth > photo.element.height()) {
			if (photo.element.width() > photo.element.height()) {
				if (advisor.bio.verticalAlign == "center") {
					photoIMG.top = (photo.element.height() - photo.element.width() * AdvisorBio.defaultImageHeight / AdvisorBio.defaultImageWidth) / 2;
				} else if (advisor.bio.verticalAlign == "top") {
					photoIMG.top = 0;
				} else if (advisor.bio.verticalAlign == "bottom") {
					photoIMG.top = photo.element.height() - photo.element.width() * AdvisorBio.defaultImageHeight / AdvisorBio.defaultImageWidth;
				}
				// verticalOffset has priority on verticalAlign
				if (advisor.bio.verticalOffset) {
					// 1/3 of the image is positioned to 1/3 of the image container 
					photoIMG.top = (photo.element.height() - photo.element.width() * AdvisorBio.defaultImageHeight / AdvisorBio.defaultImageWidth) / 3;
					photoIMG.top += (advisor.bio.verticalOffset * photo.element.width() / AdvisorBio.defaultImageWidth);
				}
			}
		}
		
		if(photoIMG.left > 0){
			photoIMG.left = 0;
		}
		
		if(photoIMG.top > 0){
			photoIMG.top = 0;
		}
		
		photoIMG.element.css('left',photoIMG.left);
		photoIMG.element.css('top',photoIMG.top);
	}
}

AdvisorBio.resize = function(){
	AdvisorBio.updateImage();
	//column length
	if(Site.width <= AdvisorBio.columns2Min){
		AdvisorBio.changeColumns(2);
	}else{
		AdvisorBio.changeColumns(4);
	}
}

AdvisorBio.changeColumns = function(value){
	if(AdvisorBio.columnLength != value){
		AdvisorBio.columnLength = value;
		if(AdvisorBio.visible){
			var advisor = Advisors.get(AdvisorBio.currentIndex);
			AdvisorBio.hide(false);
			AdvisorBio.show(advisor.id, false);
		}
	}
}

//----------------------------------------------------------------------------------------------------
//start
//----------------------------------------------------------------------------------------------------
$(function(){
	Employees.init();
	Advisors.init();
	EmployeeBio.init();
	AdvisorBio.init();
	Keyboard.init();

	//resize
	$(window).resize(function(){
		Employees.resize();
		Advisors.resize();
		EmployeeBio.resize();
		AdvisorBio.resize();
	});

	Employees.resize();
	Advisors.resize();
	EmployeeBio.resize();
	AdvisorBio.resize();
	
	Employees.loadHiResImages();
	Advisors.loadHiResImages();
});
