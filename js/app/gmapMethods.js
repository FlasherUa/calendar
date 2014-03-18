var geocode=function (id) {
	GMaps.geocode({
		address: $('.address'+id).val(),
		callback: function(results, status) {
			if (status == 'OK') {
				var latlng = results[0].geometry.location;
				map.setCenter(latlng.lat(), latlng.lng());
			}
		}
	});

}

/***
 *  
 * Google map driver
 * 
 * */
var map=new GMaps({
	div: '#map',
	lat: -12.043333,
	lng: -70.028333,
	zoom:7,
	click:function (e) {app.vent.trigger("map:click",e); }
});

var methods={
		map:map,
		placeMarker:function (lat, lng){
			methods.map.setCenter(lat, lng);
			methods.marker(lat, lng);
			//methods.printCoordinates(lat, lng);
			controller.markerUpdateCoords(lat, lng);
		},
		marker:function (lat, lng, model) {return methods.map.addMarker({
			lat: lat,
			lng: lng,
			title:model!=undefined?model.get ("title"):"New Marker",
					icon:document.getElementsByTagName('base')[0].href+"img/marker"+(model!=undefined?model.get ("type"):"0")+".png",
					click:function () {
						app.showInfo (model.get("title"),model.get("descr"),this);
					},
					draggable:false,//true,
					dragend :function (geoObj){
						/*marker moved*/
						var lat= geoObj.latLng.lat();
						var lng= geoObj.latLng.lng();
						/*center map*/
						methods.map.setCenter(lat, lng);
						/*print coordinates*/
						app.vent("map:markerDropped", lat, lng);
						//	methods.printCoordinates(lat, lng);
						/*addddnnnn!! Find adreess to this location!!! */
						/*	methods.loadGeoCode("", function (results) {
					/ *setup autocomplete obj* /
					var ac=[];
					for (var i in results) {

						var adr=results[i];
						ac.push({label:adr.formatted_address, value:adr.formatted_address, data:adr, noMarker:true}); 
					}
					/ *send to autocomplete* /
					methods.acresponce(ac);
					$( '#address' ).val("");
					$( '#address' ).autocomplete("option","minLength", 0);
					$( '#address' ).autocomplete("search","");
				}, lat, lng); */
					}
		});
		},
		drawMarkers:function (list){
			if (this.markers!=undefined) {
				_.each(this.markers,function (m){ 
					m.setVisible(true);
				});
				return;
			}
			var that=this;
			this.markers={};
			list.each (function (model) {
				that.markers[model.get("id")]=methods.marker(model.get("lat"), model.get("lon"), model);
			});
			//this.markers=markers;

		},
		hideMarkers:function () {
			if (this.markers==undefined) return;
			_.each(this.markers,function (m){ 
				m.setVisible(false);
			});
		},
		delMarkers:function () {
			//clean markers
			if (this.markers!=undefined) {
				_.each(this.markers,function (m){ 
					m.setMap(null);
				});
				delete this.markers;

			}

		},

		drawLines:function (list) {
			if (this.lines!=undefined) {
				this.lines.setVisible(true);
				_.each(this.ways ,function (way){
					way.setVisible(true);
				});
				return;
			}

			/*loop collection, add coordintaes*/
			if (app.cfg.showLines) {
				this.ways=[];
				var prev;
				/*setup coordintae array*/
				var Coordinates = [];
				var start=[];
				_.each (list.models,function (model) {
					Coordinates.push( new google.maps.LatLng(model.get("lat"), model.get("lon")))
					if (start.length!=0){//this is end-point, draw line
						start.push(new google.maps.LatLng(model.get("lat"), model.get("lon")));
						methods.drawLine(start);
						start=[];	
					} 
					if (model.get("ways")=="yes") start.push(new google.maps.LatLng(model.get("lat"), model.get("lon")));
					//if start

				});

				this.lines = new google.maps.Polyline({
					path: Coordinates,
					geodesic: true,
					strokeColor: '#FF0000',
					strokeOpacity: 1.0,
					strokeWeight: 2,
					/*icons*/
					icons: [
					        {fixedRotation:false, 
					        	icon:{ path:google.maps.SymbolPath.FORWARD_CLOSED_ARROW, //'M -2,0 0,-2 2,0 0,2 z',
					        		strokeColor: '#FF0000',
					        		fillColor: '#F00',
					        	},
					        	repeat:"50px",
					        	offset:"60px"
					        }
					        ]

				});

				this.lines.setMap(map.map);
			}

		},
		drawLine:function (Coordinates, icon) {
			ways = new google.maps.Polyline({
				path: Coordinates,
				geodesic: true,
				strokeColor: '#FF0000',
				strokeOpacity: 1.0,
				strokeWeight: 2,
				/*icons*/
				icons: [
				        {fixedRotation:false, 
				        	icon:{ path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW, //'M -2,0 0,-2 2,0 0,2 z',
				        		strokeColor: '#FF0000',
				        		fillColor: '#F00',
				        	},
				        	repeat:"50px",
				        	offset:"60px"
				        }
				        ]

			});

			ways.setMap(map.map);
			this.ways.push(ways);
		} ,
		hideLines:function () {
			if (this.lines==undefined) return;
			this.lines.setVisible(false);
			_.each(this.ways ,function (way){
				way.setVisible(false);
			});
		},//redraw markers and lines
		delLines:function () {
			if (this.lines==undefined) return;
			this.lines.setMap(null);
			delete this.lines; 
			_.each(this.ways ,function (way){
				way.setMap(null);
				//delete this.way;
			});
			delete this.ways;
		},

};


