﻿import com.fusionmaps.core.Map;
class com.fusionmaps.maps.SaudiArabiaMap extends Map {
	//Version number (if different from super Map class)
	//private var _version:String = "3.0.0";
	//MapId represents the identifier name of the map movie clip
	private var mapId:String = "SaudiArabiaMap";
	/**
	* Constructor function. We invoke the super class'
	* constructor and then set the objects for this map.
	*/
	function SaudiArabiaMap(targetMC:MovieClip, depth:Number, width:Number, height:Number, x:Number, y:Number, debugMode:Boolean, lang:String ,scaleMode: String, registerWithJS: Boolean, DOMId:String){
		//Invoke the super class constructor
		super(targetMC, depth, width, height, x, y, debugMode, lang, scaleMode ,registerWithJS, DOMId);
		//Set the identifier name of Map movie clip
		this.config.mapId = mapId;
	}
	/**
	 * render method renders the chart.
	*/
	public function render():Void {
		//Feed entities for this chart
		this.feedEntities();
		//Just call render of parent method
		super.render();
	}
	/**
	 * feedEntities method feeds the entities of this chart in the entity array.
	 * Each country/state/county/city on the map is stored as an entity with following
	 * properties: id, shortName, longName
	 * For any map, the feedEntities is a MUST. All entities on the map should be fed
	 * in this function.
	*/
	public function feedEntities() {
		super.addEntity("SA.BA", "BA", "BA", "Al Bahah");
		super.addEntity("SA.HS", "HS", "HS", "Al Hudud Ash Shamaliyah");
		super.addEntity("SA.JF", "JF", "JF", "Al Jawf");
		super.addEntity("SA.MD", "MD", "MD", "Al Madinah");
		super.addEntity("SA.QS", "QS", "QS", "Al Qasim");
		super.addEntity("SA.RI", "RI", "RI", "Ar Riyad");
		super.addEntity("SA.SH", "SH", "SH", "Ash Sharqiyah");
		super.addEntity("SA.AS", "AS", "AS", "Asir");
		super.addEntity("SA.HA", "HA", "HA", "Hail");
		super.addEntity("SA.JZ", "JZ", "JZ", "Jizan");
		super.addEntity("SA.MK", "MK", "MK", "Makkah");
		super.addEntity("SA.NJ", "NJ", "NJ", "Najran");
		super.addEntity("SA.TB", "TB", "TB", "Tabuk");
		}
	/**
	 * reInit method re-initializes the map. This method is basically called
	 * when the user changes map data through JavaScript. In that case, we need
	 * to re-initialize the map, set new XML data and again render. 	 
	*/
	public function reInit():Void {
		//Invoke the super class's reInit method.
		super.reInit();
		//Set the identifier name of Map movie clip
		this.config.mapId = mapId;
	}
}
