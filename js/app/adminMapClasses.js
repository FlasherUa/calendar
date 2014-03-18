/*ADMIn*/

//appCfg.menus.bottom.newRoute="New Route";
appCfg.menus.bottom.newMarker="New Marker";
delete appCfg.menus.bottom.login;
appCfg.menus.bottom.logout="Logout";
appCfg.emptyMarker={title: '', descr :"", lon:"",lat:"",type:1,ordr:1000000,parent:1,date:"",ways:"", id:"empty" }
/**
 * 
 * EOF CONFIG 
 */

/*bottom menu*/
var bottomMenu="";
_.each (appCfg.menus.bottom,function (v,k){
	button=_.template (appCfg.templates.buttonBot,{t:v,action:k});
	bottomMenu+=button;
});
$("#bottomMenu").prepend(bottomMenu);

/*Marionette application*/

var app= new Backbone.Marionette.Application();
app.cfg={
		addMarker:true,//state of map to add new marker
		showMarkers:true,
		showLines:true
}

var currentParent=1;
var list;//list Collection
var listView;//list CollectionView
app.geocode=geocode;



/**
 * Markers List
 * 
 */

app.markersList=function (data) {

	var MarkerPanel = Backbone.Marionette.ItemView.extend({
		template:_.template(appCfg.templates.MarkerPanel),
		events: {
			"click .del":controller.markerDel,
			"click .up":controller.markerUp,
			"click .dn":controller.markerDn,
		},
		active:false, 
		activate:function (a) {
			/*color single item buttons*/
			this.$el.find(".up").removeAttr("disabled").addClass("btn-info");
			this.$el.find(".dn").removeAttr("disabled").addClass("btn-info");
			this.$el.find(".del").removeAttr("disabled").addClass("btn-danger");
		},
		/*disable single item buttons*/
		deactivate:function (a) {
			this.$el.find(".up").attr("disabled","disabled" ).removeClass("btn-info");
			this.$el.find(".dn").attr("disabled","disabled").removeClass("btn-info");
			this.$el.find(".del").attr("disabled","disabled").removeClass("btn-danger");
		},
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

/**
 * Marker Edit
 * 
 */

app.markerEdit=function (data) {

	/*render Panel*/
	var mPanel= _.template(appCfg.templates.tPanel, {id:"mPanel", 
		title:"Edit marker", 
		content:"" });

	$("body").append (mPanel);



	var editView = Backbone.Marionette.ItemView.extend({
		//tagName: "a class='list-group-item' href='#' ",
		template: _.template(appCfg.templates.markers.editForm),
		initialize: function () {
			//should be update values
			//this.model.on('change', this.render, this);
			app.vent.bind ('updateEdit',this.render, this );
		},
		events : {
			//	"change input" :"changed",
			//	"change select" :"changed"
		},

		changed:	function(evt) {
			var target = evt.currentTarget,
			data = {};
			data[target.name] = target.value;
			this.model.set(data);
			app.vent.trigger("marker:formChanged");
		},
		inited:false, 
		onRender:function () {
			//if (this.inited) return;
			this.inited=true;
			$("input", this.$el).addClass("form-control");

			var options="";
			var type=this.model.get("type");
			$s=$("select[name='type']", this.$el)
			.addClass("form-control");
			$s.find("option")
			.each(function (){
				var htm=this.innerHTML;
				if (type==htm)selected="selected='selected'"
					else selected="";
				options+=_.template(appCfg.templates.markerTypeOption,
						{t:htm, selected:selected}
				)
			}); 
			if (this.model.get("ways")=="yes") $("input[type=checkbox]").attr("checked","checked" );
			
			$s.html(options).msDropDown().change(function (e){
				//	app.vent.trigger("dataChanged",e);
			});

			/*subcribe events*/
		},
		setEditMode:function () {
			//console.log(this.$el);
			this.$el.find("input[name='step']").val(24);
			app.editFormAction="markers_edit/"+this.model.get("id");//this.$el.find("form").attr("action","marker_edit/");
		},
		setAddMode:function () {
			this.$el.find("input[name='step']").val(15);
			app.editFormAction="markers_add/";//this.$el.find("form").attr("action","marker_add/");
		}
	});
	var edit = new editView({
		model: currentMarker,
		el : "#mPanel .panel-body ",

	});
	edit.render();
	edit.setAddMode();
	app.editForm=edit;

}



/*load template*/
$.get("markers_add/template.html", function (data){
	appCfg.templates.markers.editForm=data;
	app.markerEdit (0); 
	
});
/*
 * data containers
 */

var markerModel= Backbone.Model.extend({
	urlRoot:"route/marker"
});
var currentMarker= new markerModel(appCfg.emptyMarker);//collection item, default value
var list;
var listCollection =  Backbone.Collection.extend({
	model:markerModel,
	urlRoot:"route/1" 
});



/*
 * UI controller
 * */
var controller={};
controller.mapClicked=function (map,b) {
	//if (!methods.marker)
	var lat=map.latLng.lat();
	var lng=map.latLng.lng();
//	methods.placeMarker (lat,lng); 
	//currentMarker.set ({lat:lat,lon:lng});
	//update form directly
	$("input[name=lat]").val(lat);
	$("input[name=lon]").val(lng);

	//app.vent.trigger('updateEdit');

	//console.log(map,methods.marker); 
	//methods.marker.setPosition(map.latLng);
	//methods.marker.dragend(map); 
};
controller.mapMarkerDropped=function (lat, lng) {
	controller.markerUpdateCoords(lat, lng);
};

controller.markerUpdateCoords=function (lat, lng){

};

controller.markerInit=function (model){
//	create a marker on a map
	/*	if (app.cfg.showMarkers) {
		methods.marker (model.get("lat"),model.get("lon"),model);
	}*/
};
controller.listClicked=function (model) {
	//setCurrentMarker
	currentMarker.set(model.attributes);//.set ({lat:lat,lon:lng});
	//go Map position to marker
	methods.map.setCenter(model.get("lat"), model.get("lon"));

	app.vent.trigger('updateEdit');
	//set form to edit
	app.editForm.setEditMode();

};
controller.listInit=function () {
	controller.reDrawMapObjects();
}
controller.listReordered=function () {
	app.vent.trigger("load:start");
	$.ajax({url:"route/1",
		success:function (data) {
			list=new listCollection(data);
			//app.markersList(data);
			listView.collection=list;
			listView.render();
			app.vent.trigger("list:updateCollection");
			controller.reDrawMapObjects();
			app.vent.trigger("button:newMarker");
			app.vent.trigger("load:end");
		}	
	})
}

controller.loadEnd=function() {
	$("#loading").hide();
}
controller.loadStart=function() {
	$("#loading").show();
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


/*uodate model on form change*/

controller.markerFormChanged=function (data){
	/**
	 * 1 if current model not exists - create one
	 * else change 
	 * 2 update collection view
	 */

	if (currentMarker.id=="empty"){
		/*
		 * create marker
		 */
		collection.addMarker()
	}else {

	}
}

controller.newMarker=function (){
	currentMarker.set(appCfg.emptyMarker);
	app.vent.trigger('updateEdit');
	app.editForm.setAddMode();

}
controller.newRoute=function (){

}

controller.logout=function (){
document.location.href="admin/logout";
}

controller.toggleMarkers=function (){
	app.cfg.showMarkers=!app.cfg.showMarkers;
	controller.reDrawMapObjects();
}
controller.toggleLines=function (){
	app.cfg.showLines=!app.cfg.showLines;
	controller.reDrawMapObjects();
}

controller.updateCollectionItem=function(id){
	/*if id exist ib collection - just update
	if not - add new item*/
	var a=list.where({id:id});
	if (a.length>0){
		//FOUND
		a[0].fetch({success:function (r){
			//console.log(r);
			controller.modelSaved(id);
		}});

	}else{
		/*model not found
		 *1 model add
		 *2 model fetch 
		 */
		var model=new markerModel ({id:id});

		model.fetch ({success:function (r){
			list.add(model);
			controller.modelSaved(id);
		}}); 

	}
}
/*on model data is saved to server*/
controller.modelSaved=function (id){
	//update list view
	listView.render();
	//update marker
	//clean markers
	methods.delMarkers();
	if (app.cfg.showMarkers) methods.drawMarkers(list);
	methods.delLines();
	if (app.cfg.showLines) methods.drawLines(list);
}
/*Singel markers buttons actions*/
controller.markerDel=function () {
	var id=currentMarker.get("id");
	var l="markers_del/"+id+".json";
	app.ajax(l);
	app.vent.trigger ("butt:newMarker");
}

controller.markerUp=function () {
	
	var id=currentMarker.get("id");
	var l="markers_orderup/"+id+".json";
	app.ajax(l);
}

controller.markerDn=function () {
	var id=currentMarker.get("id");
	var l="markers_orderdn/"+id+".json";
	app.ajax(l);
}

app.ajax=function (l){
	app.vent.trigger("load:start");
	$.ajax ({url:l,
		success:function () {
			app.vent.trigger("list:reordered");
		}
	});

}
/*
 * Events aggregator
 */
app.vent.bind ("map:click", controller.mapClicked);
app.vent.bind ("map:markerClick", controller.mapMarkerClicked);
app.vent.bind ("map:markerDropped", controller.mapMarkerDropped);//on drag&drop finished

app.vent.bind ("marker:init", controller.markerInit);
app.vent.bind ("marker:formChanged", controller.markerFormChanged);

app.vent.bind ("marker:updateCoords", controller.markerUpdateCoords);
app.vent.bind("model:saved", controller.modelSaved);

app.vent.bind ("list:init", controller.listInit);
app.vent.bind ("list:click", controller.listClicked);
app.vent.bind ("list:loaded", controller.listReordered);
app.vent.bind ("list:del", controller.listReordered);
app.vent.bind ("list:reordered", controller.listReordered);

app.vent.bind ("butt:newRoute", controller.newRoute);
app.vent.bind ("butt:logout", controller.logout);
app.vent.bind ("butt:newMarker", controller.newMarker);
app.vent.bind ("butt:toggleLines", controller.toggleLines);
app.vent.bind ("butt:toggleMarkers", controller.toggleMarkers);

app.vent.bind("load:start",controller.loadStart);
app.vent.bind("load:end",controller.loadEnd);

app.finishAction=function (response) {
//	on Form submitted	
//	console.log(response);
	if (response.object=="markers" && response.state=="end" && (response.action=="edit"||response.action=="add")){
		controller.updateCollectionItem(response.id);
		app.message("Saved","ok")
	} 
	if (response.errors){

	}
	app.vent.trigger("load:end");
}



app.lines={};
app.message=function (text, type) {
	if ($("#message").length==0){
		$("body").append('<div id="message" class="alert"></div>');
	}
	$message=$("#message");
	if(type=="ok") $message.removeClass("alert-danger").addClass("alert-success");
	else $message.removeClass("alert-success").addClass("alert-danger");
	$message.html(text).fadeIn(1000).fadeOut(7000);
}

function 	themeError(response){
	app.message("<b>Error:<b>"+response.errors.join("<br />") ,"err");
	app.vent.trigger("load:end");
}
/* info window on click */
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

/********
 * init app
 */
/*load sample data*/
app.vent.trigger("load:start");
$.get("route/1", function (data){
	app.markersList(data);
	app.vent.trigger("load:end");
});
