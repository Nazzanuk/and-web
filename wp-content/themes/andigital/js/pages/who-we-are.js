var Keyboard={};Keyboard.init=function(){$(window).keyup(function(a){AdvisorBio.visible&&(EmployeeBio.visible&&EmployeeBio.hide(!1),27==a.keyCode&&AdvisorBio.hide(!0),37==a.keyCode&&AdvisorBio.showPrevious(),39==a.keyCode&&AdvisorBio.showNext()),EmployeeBio.visible&&(AdvisorBio.visible&&AdvisorBio.hide(!1),27==a.keyCode&&EmployeeBio.hide(!0),37==a.keyCode&&EmployeeBio.showPrevious(),39==a.keyCode&&EmployeeBio.showNext())})};var Employees={};Employees.subfolder="midres/",Employees.dir="our-people/"+Employees.subfolder,Employees.employees=employees,Employees.init=function(){for(var a=0;a<Employees.employees.length;a++){var b=Employees.get(a);b.element.mouseover(function(){Employees.mouseOver($(this).attr("dataId"))}),b.element.mouseout(function(){Employees.mouseOut($(this).attr("dataId"))}),b.element.click(function(){AdvisorBio.visible&&AdvisorBio.hide(!1),EmployeeBio.show($(this).attr("dataId"),!0)}),Employees.employees[a].index=a}$(".employee .image-2").fadeTo(0,0)},Employees.getIndexByID=function(a){for(var b=0,c=0;c<Employees.employees.length;c++)Employees.employees[c].id==a&&(b=c);return b},Employees.getByID=function(a){var b=Employees.getIndexByID(a),c=Employees.get(b);return c},Employees.get=function(a){var b=Employees.employees[a];return b&&(b.element=$("#employee-"+b.id)),b},Employees.mouseOver=function(a){var b=Employees.getByID(a);b.element.find(".image-2").stop().fadeTo(500,1)},Employees.mouseOut=function(a){var b=Employees.getByID(a);b.element.find(".image-2").stop().fadeTo(500,0)},Employees.resize=function(){$("#employee-list").width(Site.width-10)},Employees.loadHiResImages=function(){$("#employee-list").find("img").each(function(a,b){var c=/(.*)\/lowres\/(.*)/g,d=c.exec($(b).attr("src"));3==d.length&&$(b).attr("src",d[1]+"/"+Employees.subfolder+d[2])})};var Advisors={};Advisors.subfolder="midres/",Advisors.dir="advisory-board/"+Advisors.subfolder,Advisors.advisors=advisors,Advisors.init=function(){for(var a=0;a<Advisors.advisors.length;a++){var b=Advisors.get(a);b.element.mouseover(function(){Advisors.mouseOver($(this).attr("dataId"))}),b.element.mouseout(function(){Advisors.mouseOut($(this).attr("dataId"))}),b.element.click(function(){EmployeeBio.visible&&EmployeeBio.hide(!1),AdvisorBio.show($(this).attr("dataId"),!0)}),Advisors.advisors[a].index=a}$(".advisor .image-2").fadeTo(0,0)},Advisors.getIndexByID=function(a){for(var b=0,c=0;c<Advisors.advisors.length;c++)Advisors.advisors[c].id==a&&(b=c);return b},Advisors.getByID=function(a){var b=Advisors.getIndexByID(a),c=Advisors.get(b);return c},Advisors.get=function(a){var b=Advisors.advisors[a];return b&&(b.element=$("#advisor-"+b.id)),b},Advisors.mouseOver=function(a){var b=Advisors.getByID(a);b.element.find(".image-2").stop().fadeTo(500,1)},Advisors.mouseOut=function(a){var b=Advisors.getByID(a);b.element.find(".image-2").stop().fadeTo(500,0)},Advisors.resize=function(){$("#advisor-list").width(Site.width-10)},Advisors.loadHiResImages=function(){$("#advisor-list").find("img").each(function(a,b){var c=/(.*)\/lowres\/(.*)/g,d=c.exec($(b).attr("src"));3==d.length&&$(b).attr("src",d[1]+"/"+Advisors.subfolder+d[2])})};var EmployeeBio={};EmployeeBio.currentIndex=-1,EmployeeBio.lastInColumnIndex=-1,EmployeeBio.visible=!1,EmployeeBio.columnLength=5,EmployeeBio.columns2Min=500,EmployeeBio.columns4Min=900,EmployeeBio.defaultImageWidth=1300,EmployeeBio.defaultImageHeight=1950,EmployeeBio.ready=!0,EmployeeBio.init=function(){},EmployeeBio.html=function(a){var b=Employees.getByID(a),c="";return c+='<div id="employee-bio">',c+='<div id="employee-bio-photo">',c+='<img id="employee-bio-photo-img" src="'+Site.dir+"/img/who-we-are/"+Employees.dir+b.id+"-3.jpg?v="+version+'"/>',c+="</div>",c+='<div id="employee-bio-details">',c+='<h3 id="employee-bio-name"><label>'+b.name+"</label></h3>",c+='<div class="underline-3"></div>',c+='<h3 id="employee-bio-title">'+b.title+"</h3>",c+='<div id="employee-bio-text">',c+="<h4>Career Background</h4>",c+='<p id="employee-bio-career-background"></p>',c+='<div id="employee-bio-role-container">',c+="<h4>Role</h4>",c+='<p id="employee-bio-role"></p>',c+="</div>",c+="<h4>Superhero Power</h4>",c+='<p id="employee-bio-super-hero-power"></p>',c+="</div>",c+='<div id="employee-bio-close">',c+='<img id="employee-bio-close-img" src="'+Site.dir+'/img/who-we-are/close-dark.png"/>',c+="</div>",c+="</div>",c+='<div class="clear"></div>',c+="</div>"},EmployeeBio.updateHTML=function(a){var b=Employees.getByID(a);$("#employee-bio-name label").html(b.name),$("#employee-bio-title").html(b.title),$("#employee-bio-photo-img").attr("src",Site.dir+"img/who-we-are/"+Employees.dir+b.id+"-3.jpg?v="+version)},EmployeeBio.addMouseEvents=function(){$("#employee-bio-close").click(function(){EmployeeBio.hide(!0)})},EmployeeBio.show=function(a,b){EmployeeBio.ready=!1;var c=Employees.getByID(a),d=(Math.ceil(Employees.employees.length/EmployeeBio.columnLength),Math.ceil((c.index+1)/EmployeeBio.columnLength)),e=d*EmployeeBio.columnLength-1;e>Employees.employees.length-1&&(e=Employees.employees.length-1);var f=Employees.get(e);e==EmployeeBio.lastInColumnIndex?(EmployeeBio.currentIndex=c.index,EmployeeBio.updateHTML(c.id)):(-1!=EmployeeBio.lastInColumnIndex&&EmployeeBio.hideBioText(),EmployeeBio.currentIndex=c.index,EmployeeBio.lastInColumnIndex=e,f.element.after(EmployeeBio.html(c.id)),EmployeeBio.addMouseEvents(),EmployeeBio.visible=!0),EmployeeBio.loadBio(c.id,function(a){EmployeeBio.showBioText(a.id),EmployeeBio.updateImage(),2==EmployeeBio.columnLength?$("#employee-bio-close-img").attr("src",Site.dir+"/img/who-we-are/close-light.png"):$("#employee-bio-close-img").attr("src",Site.dir+"/img/who-we-are/close-dark.png"),b?Site.scrollToHeader({target:"employee-bio",offset:-5,complete:function(){EmployeeBio.ready=!0}}):EmployeeBio.ready=!0})},EmployeeBio.loadBio=function(a,b){var c=Employees.getByID(a);c.hasOwnProperty("bio")?b(c):c.loading||(c.loading=!0,$.getJSON(Site.dir+"data/employees/"+c.id+".json",function(a){c.bio=a,b(c),c.loading=!1}))},EmployeeBio.showBioText=function(a){var b=Employees.getByID(a);$("#employee-bio-career-background").html(b.bio.careerBackground),b.bio.showRole?($("#employee-bio-role").html(b.bio.role),$("#employee-bio-role-container").show()):$("#employee-bio-role-container").hide(),$("#employee-bio-super-hero-power").html(b.bio.superHeroPower)},EmployeeBio.showPrevious=function(){if(EmployeeBio.visible&&EmployeeBio.ready){var a=EmployeeBio.currentIndex-1;if(-1!=a){var b=Employees.get(a);EmployeeBio.show(b.id,!0)}}},EmployeeBio.showNext=function(){if(EmployeeBio.visible&&EmployeeBio.ready){var a=Number(EmployeeBio.currentIndex)+1;if(a!=Employees.employees.length){var b=Employees.get(a);EmployeeBio.show(b.id,!0)}}},EmployeeBio.hideBioText=function(){$("#employee-bio").remove(),EmployeeBio.currentIndex=-1,EmployeeBio.lastInColumnIndex=-1},EmployeeBio.hide=function(a){if(EmployeeBio.visible&&EmployeeBio.ready){if(a){var b=Employees.get(EmployeeBio.currentIndex);Site.scrollToHeader({target:"employee-"+b.id,offset:-5})}EmployeeBio.hideBioText(),EmployeeBio.visible=!1}},EmployeeBio.updateImage=function(){var a={};a.element=$("#employee-bio-photo");var b={};b.element=$("#employee-bio-photo-img");var c=Employees.get(EmployeeBio.currentIndex);c&&c.bio&&(a.element.height()*EmployeeBio.defaultImageWidth/EmployeeBio.defaultImageHeight>a.element.width()&&("center"==c.bio.horizontalAlign?b.left=(a.element.width()-a.element.height()*EmployeeBio.defaultImageWidth/EmployeeBio.defaultImageHeight)/2:"left"==c.bio.horizontalAlign?b.left=0:"right"==c.bio.horizontalAlign&&(b.left=a.element.width()-a.element.height()*EmployeeBio.defaultImageWidth/EmployeeBio.defaultImageHeight),c.bio.horizontalOffset&&(b.left=(a.element.width()-a.element.height()*EmployeeBio.defaultImageWidth/EmployeeBio.defaultImageHeight)/2,b.left+=c.bio.horizontalOffset*(a.element.height()/EmployeeBio.defaultImageHeight))),a.element.width()*EmployeeBio.defaultImageHeight/EmployeeBio.defaultImageWidth>a.element.height()&&a.element.width()>a.element.height()&&("center"==c.bio.verticalAlign?b.top=(a.element.height()-a.element.width()*EmployeeBio.defaultImageHeight/EmployeeBio.defaultImageWidth)/2:"top"==c.bio.verticalAlign?b.top=0:"bottom"==c.bio.verticalAlign&&(b.top=a.element.height()-a.element.width()*EmployeeBio.defaultImageHeight/EmployeeBio.defaultImageWidth),c.bio.verticalOffset&&(b.top=(a.element.height()-a.element.width()*EmployeeBio.defaultImageHeight/EmployeeBio.defaultImageWidth)/3,b.top+=c.bio.verticalOffset*a.element.width()/EmployeeBio.defaultImageWidth)),b.left>0&&(b.left=0),b.top>0&&(b.top=0),b.element.css("left",b.left),b.element.css("top",b.top))},EmployeeBio.resize=function(){EmployeeBio.updateImage(),EmployeeBio.changeColumns(Site.width<=EmployeeBio.columns2Min?2:Site.width<=EmployeeBio.columns4Min?4:5)},EmployeeBio.changeColumns=function(a){if(EmployeeBio.columnLength!=a&&(EmployeeBio.columnLength=a,EmployeeBio.visible)){var b=Employees.get(EmployeeBio.currentIndex);EmployeeBio.hide(!1),EmployeeBio.show(b.id,!1)}};var AdvisorBio={};AdvisorBio.currentIndex=-1,AdvisorBio.lastInColumnIndex=-1,AdvisorBio.visible=!1,AdvisorBio.columnLength=4,AdvisorBio.columns2Min=900,AdvisorBio.defaultImageWidth=1860,AdvisorBio.defaultImageHeight=2100,AdvisorBio.ready=!0,AdvisorBio.init=function(){},AdvisorBio.html=function(a){var b=Advisors.getByID(a),c="";return c+='<div id="advisor-bio">',c+='<div id="advisor-bio-photo">',c+='<img id="advisor-bio-photo-img" src="'+Site.dir+"/img/who-we-are/"+Advisors.dir+b.id+"-2.jpg?v="+version+'"/>',c+="</div>",c+='<div id="advisor-bio-details">',c+='<h3 id="advisor-bio-name"><label>'+b.name+"</label></h3>",c+='<div class="underline-3"></div>',c+='<h3 id="advisor-bio-title">'+b.title+"</h3>",c+='<div id="advisor-bio-text">',c+="<h4>Career Background</h4>",c+='<p id="advisor-bio-career-background"></p>',c+="<h4>Hobbies</h4>",c+='<p id="advisor-bio-hobbies"></p>',c+="</div>",c+='<div id="advisor-bio-close">',c+='<img id="advisor-bio-close-img" src="'+Site.dir+'/img/who-we-are/close-dark.png"/>',c+="</div>",c+="</div>",c+='<div class="clear"></div>',c+="</div>"},AdvisorBio.updateHTML=function(a){var b=Advisors.getByID(a);$("#advisor-bio-name label").html(b.name),$("#advisor-bio-title").html(b.title),$("#advisor-bio-photo-img").attr("src",Site.dir+"img/who-we-are/"+Advisors.dir+b.id+"-2.jpg?v="+version)},AdvisorBio.addMouseEvents=function(){$("#advisor-bio-close").click(function(){AdvisorBio.hide(!0)})},AdvisorBio.show=function(a,b){AdvisorBio.ready=!1;var c=Advisors.getByID(a),d=(Math.ceil(Advisors.advisors.length/AdvisorBio.columnLength),Math.ceil((c.index+1)/AdvisorBio.columnLength)),e=d*AdvisorBio.columnLength-1;e>Advisors.advisors.length-1&&(e=Advisors.advisors.length-1);var f=Advisors.get(e);e==AdvisorBio.lastInColumnIndex?(AdvisorBio.currentIndex=c.index,AdvisorBio.updateHTML(c.id)):(-1!=AdvisorBio.lastInColumnIndex&&AdvisorBio.hideBioText(),AdvisorBio.currentIndex=c.index,AdvisorBio.lastInColumnIndex=e,f.element.after(AdvisorBio.html(c.id)),AdvisorBio.addMouseEvents(),AdvisorBio.visible=!0),AdvisorBio.loadBio(c.id,function(a){AdvisorBio.showBioText(a.id),AdvisorBio.updateImage(),2==AdvisorBio.columnLength?$("#advisor-bio-close-img").attr("src",Site.dir+"/img/who-we-are/close-light.png"):$("#advisor-bio-close-img").attr("src",Site.dir+"/img/who-we-are/close-dark.png"),b?Site.scrollToHeader({target:"advisor-bio",offset:-5,complete:function(){AdvisorBio.ready=!0}}):AdvisorBio.ready=!0})},AdvisorBio.loadBio=function(a,b){var c=Advisors.getByID(a);c.hasOwnProperty("bio")?b(c):c.loading||(c.loading=!0,$.getJSON(Site.dir+"data/advisors/"+c.id+".json",function(a){c.bio=a,b(c),c.loading=!1}))},AdvisorBio.showBioText=function(a){var b=Advisors.getByID(a);$("#advisor-bio-career-background").html(b.bio.careerBackground),$("#advisor-bio-role").html(b.bio.role),$("#advisor-bio-hobbies").html(b.bio.hobbies)},AdvisorBio.showPrevious=function(){if(AdvisorBio.visible&&AdvisorBio.ready){var a=AdvisorBio.currentIndex-1;if(-1!=a){var b=Advisors.get(a);AdvisorBio.show(b.id,!0)}}},AdvisorBio.showNext=function(){if(AdvisorBio.visible&&AdvisorBio.ready){var a=Number(AdvisorBio.currentIndex)+1;if(a!=Advisors.advisors.length){var b=Advisors.get(a);AdvisorBio.show(b.id,!0)}}},AdvisorBio.hideBioText=function(){$("#advisor-bio").remove(),AdvisorBio.currentIndex=-1,AdvisorBio.lastInColumnIndex=-1},AdvisorBio.hide=function(a){if(AdvisorBio.visible&&AdvisorBio.ready){if(a){var b=Advisors.get(AdvisorBio.currentIndex);Site.scrollToHeader({target:"advisor-"+b.id,offset:-5})}AdvisorBio.hideBioText(),AdvisorBio.visible=!1}},AdvisorBio.updateImage=function(){var a={};a.element=$("#advisor-bio-photo");var b={};b.element=$("#advisor-bio-photo-img");var c=Advisors.get(AdvisorBio.currentIndex);c&&c.bio&&(a.element.height()*AdvisorBio.defaultImageWidth/AdvisorBio.defaultImageHeight>a.element.width()&&("center"==c.bio.horizontalAlign?b.left=(a.element.width()-a.element.height()*AdvisorBio.defaultImageWidth/AdvisorBio.defaultImageHeight)/2:"left"==c.bio.horizontalAlign?b.left=0:"right"==c.bio.horizontalAlign&&(b.left=a.element.width()-a.element.height()*AdvisorBio.defaultImageWidth/AdvisorBio.defaultImageHeight),c.bio.horizontalOffset&&(b.left=(a.element.width()-a.element.height()*AdvisorBio.defaultImageWidth/AdvisorBio.defaultImageHeight)/2,b.left+=c.bio.horizontalOffset*(a.element.height()/AdvisorBio.defaultImageHeight))),a.element.width()*AdvisorBio.defaultImageHeight/AdvisorBio.defaultImageWidth>a.element.height()&&a.element.width()>a.element.height()&&("center"==c.bio.verticalAlign?b.top=(a.element.height()-a.element.width()*AdvisorBio.defaultImageHeight/AdvisorBio.defaultImageWidth)/2:"top"==c.bio.verticalAlign?b.top=0:"bottom"==c.bio.verticalAlign&&(b.top=a.element.height()-a.element.width()*AdvisorBio.defaultImageHeight/AdvisorBio.defaultImageWidth),c.bio.verticalOffset&&(b.top=(a.element.height()-a.element.width()*AdvisorBio.defaultImageHeight/AdvisorBio.defaultImageWidth)/3,b.top+=c.bio.verticalOffset*a.element.width()/AdvisorBio.defaultImageWidth)),b.left>0&&(b.left=0),b.top>0&&(b.top=0),b.element.css("left",b.left),b.element.css("top",b.top))},AdvisorBio.resize=function(){AdvisorBio.updateImage(),AdvisorBio.changeColumns(Site.width<=AdvisorBio.columns2Min?2:4)},AdvisorBio.changeColumns=function(a){if(AdvisorBio.columnLength!=a&&(AdvisorBio.columnLength=a,AdvisorBio.visible)){var b=Advisors.get(AdvisorBio.currentIndex);AdvisorBio.hide(!1),AdvisorBio.show(b.id,!1)}},$(function(){Employees.init(),Advisors.init(),EmployeeBio.init(),AdvisorBio.init(),Keyboard.init(),$(window).resize(function(){Employees.resize(),Advisors.resize(),EmployeeBio.resize(),AdvisorBio.resize()}),Employees.resize(),Advisors.resize(),EmployeeBio.resize(),AdvisorBio.resize(),Employees.loadHiResImages(),Advisors.loadHiResImages()});