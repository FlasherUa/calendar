

var app= new Backbone.Marionette.Application();
app.cfg={
		addMarker:true,//state of map to add new marker
		showMarkers:true,
		showLines:true
}
$.get("route/1", function (data){
	app.markersList(data);
	//app.vent.trigger("load:end");
});

var markerModel= Backbone.Model.extend({
	urlRoot:"route/marker"
});
var list;
var listCollection =  Backbone.Collection.extend({
	model:markerModel,
	urlRoot:"route/1" 
});

var currentMarker= new markerModel(appCfg.emptyMarker);//collection item, default value

app.markersList=function (data){
	list = new listCollection(data);

	methods.drawMarkers(list);
	methods.drawLines(list);	
}

var infowindow; 
/* info window on click */
app.showInfo=function(head, text, marker) { 
	var contentString = '<div id="content">'+
	'<div id="siteNotice">'+
	'</div>'+
	'<h1 id="firstHeading" class="firstHeading">'+head+'</h1>'+
	'<div id="bodyContent">'+
	'<p>'+text+'</p>'+
	'</div>'+
	'</div>';
	if (infowindow!=undefined) { 
		infowindow.close();
	}	
	infowindow = new google.maps.InfoWindow({
		content: contentString
	});
//	google.maps.event.addListener(marker, 'click', function() {
	infowindow.open(map.map,marker);
}



/**
 * Markers List
 * 
 */

app.markersList=function (data) {

	var MarkerPanel = Backbone.Marionette.ItemView.extend({
		template:_.template(appCfg.templates.MarkerPanel),
		active:false, 
		onRender:function () {
			app.vent.bind("list:click", this.activate, this);
			app.vent.bind("butt:newMarker", this.deactivate, this);
		}
	});

	var markerPanel=new MarkerPanel();

	var SingleLink = Backbone.Marionette.ItemView.extend({
		tagName: "a class='list-group-item' href='#' ",
		template: _.template(appCfg.templates.markersListItem),
		events: {
			"click":function (){
				app.vent.trigger("list:click",this.model);
			}

		},
		onRender:function () {
			app.vent.trigger("marker:init",this.model);
		}
	});

	/*SingleLink.on ("click", function (args){
		app.trigger("list:click",args.model);
	} );*/

	var ListView = Backbone.Marionette.CollectionView.extend({
		tagName: 'ul',
		itemView: SingleLink,
		/*onRender:function () {
			var t=this;
			this.collection.on("change",function () {
				t.render();
			})
		}*/
	});

	/**
	 * render data
	 */
	list = new listCollection(data);

	if ($("#lPanel").length==0){ 
		var lPanel= _.template(appCfg.templates.tPanel, {id:"lPanel", 
			title:"Route 1", 
			content:"<ul class='list-group'></ul>" });

		$("body").append (lPanel);
	}
	$('#lPanel .panel-heading').append('<span class="sub"></span>');
	listView=new ListView({
		collection: list,
		el: '#lPanel .panel-body ul',
		onRender:function () {
			app.vent.bind("list:updateCollection", this.render, this);
		}
	});
	listView.render();
	(new MarkerPanel({el:'#lPanel .panel-heading .sub'})).render(); 
	app.vent.trigger("list:init");
} 
/*
 * UI controller
 * */
var controller={};

controller.listClicked=function (model) {
	//setCurrentMarker
	currentMarker.set(model.attributes);//.set ({lat:lat,lon:lng});
	//go Map position to marker
	methods.map.setCenter(model.get("lat"), model.get("lon"));
	//show info window
	
	app.showInfo (model.get("title"),model.get("descr"),methods.markers[model.get("id")]);

};
controller.listInit=function () {
	controller.reDrawMapObjects();
}

controller.reDrawMapObjects=function () {
	methods.delMarkers();
	methods.delLines();
	if (app.cfg.showLines) {
		
		methods.drawLines(list);
	}else {
		//hide lines
		methods.hideLines(list);
	}

	if (app.cfg.showMarkers) {
		//methods.marker (model.get("lat"),model.get("lon"),model);
		methods.drawMarkers(list);
	}else {
		//hide lines
		methods.hideMarkers(list);
	}

}
/*
 * Events aggregator
 */

app.vent.bind ("marker:init", controller.markerInit);

app.vent.bind ("list:init", controller.listInit);
app.vent.bind ("list:click", controller.listClicked);
app.vent.bind ("list:loaded", controller.listReordered);

app.vent.bind("load:start",controller.loadStart);
app.vent.bind("load:end",controller.loadEnd);
