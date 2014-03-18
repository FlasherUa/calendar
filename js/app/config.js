/* default configs */

var appCfg={};
var appCfg={
		templates:{
			buttonBot:'<li><a onClick="app.vent.trigger(\'butt:<%-action%>\')"><%-t%></a></li>'
			
		},
		menus:{
			bottom:{
				//start:"New Route",
				toggleLines:"Toggle Lines",
				toggleMarkers:"Toggle Markers",
				login:"Login"
			}
		}
	}




appCfg.templates.tPanel='<div class="panel panel-default tpanel" id="<%-id%>">'+
'<div class="panel-heading"><%=title%></div>'+
'<div class="panel-body"><%=content%></div></div>';

appCfg.templates.markersListItem="<img src='img/marker<%-type%>.png' width='27' height='27' />&nbsp;&nbsp;<span class='title'><%-title%></span>";
appCfg.templates.MarkerPanel="<button class='up btn btn-default btn-xs' disabled='disabled'><span class='glyphicon glyphicon-chevron-up'></span></button>" +
"<button class='dn btn btn-default btn-xs' disabled='disabled' ><span class='glyphicon glyphicon-chevron-down'></span></button>" +
"<button class='del btn btn-default btn-xs' disabled='disabled'><span class='glyphicon glyphicon-remove'></span></button>";

appCfg.templates.markerTypeOption="<option value='<%-t%>' title='img/marker<%-t%>.png'  <%-selected%> ></option>";
appCfg.templates.markers={
		item:"",
		editForm:""
}

