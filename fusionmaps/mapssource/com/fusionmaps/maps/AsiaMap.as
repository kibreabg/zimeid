﻿import com.fusionmaps.core.Map;
class com.fusionmaps.maps.AsiaMap extends Map {
	//Version number (if different from super Map class)
	//private var _version:String = "3.0.0";
	//MapId represents the identifier name of the map movie clip
	private var mapId:String = "AsiaMap";
	/**
	* Constructor function. We invoke the super class'
	* constructor and then set the objects for this map.
	*/
	function AsiaMap(targetMC:MovieClip, depth:Number, width:Number, height:Number, x:Number, y:Number, debugMode:Boolean, lang:String ,scaleMode: String, registerWithJS: Boolean, DOMId:String) {
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
		super.addEntity("001", "001", "AF", "Afghanistan");
		super.addEntity("002", "002", "AM", "Armenia");
		super.addEntity("003", "003", "AZ", "Azerbaijan");
		//super.addEntity("004", "004", "BH", "Bahrain");
		super.addEntity("005", "005", "BD", "Bangladesh");
		super.addEntity("006", "006", "BT", "Bhutan");
		super.addEntity("007", "007", "BN", "Brunei");
		super.addEntity("008", "008", "MM", "Burma (Myanmar)");
		super.addEntity("009", "009", "KH", "Cambodia");
		super.addEntity("010", "010", "CN", "China ");
		//super.addEntity("011", "011", "CY", "Cyprus");
		super.addEntity("012", "012", "TP", "East Timor ");
		super.addEntity("013", "013", "GE", "Georgia");
		super.addEntity("014", "014", "IN", "India");
		super.addEntity("015", "015", "ID", "Indonesia");
		super.addEntity("016", "016", "IR", "Iran");
		//super.addEntity("017", "017", "IQ", "Iraq");
		//super.addEntity("018", "018", "IL", "Israel");
		super.addEntity("019", "019", "JP", "Japan");
		//super.addEntity("020", "020", "JO", "Jordan");
		super.addEntity("021", "021", "KZ", "Kazakhstan");
		super.addEntity("022", "022", "KP", "Korea (north)");
		super.addEntity("023", "023", "KR", "Korea (south)");
		//super.addEntity("024", "024", "KW", "Kuwait");
		super.addEntity("025", "025", "KG", "Kyrgyzstan");
		super.addEntity("026", "026", "LA", "Laos");
		//super.addEntity("027", "027", "LB", "Lebanon");
		super.addEntity("028", "028", "MY", "Malaysia");
		//super.addEntity("029", "029", "MV", "Maldives");
		super.addEntity("030", "030", "MN", "Mongolia");
		super.addEntity("031", "031", "NP", "Nepal");
		//super.addEntity("032", "032", "OM", "Oman");
		super.addEntity("033", "033", "PK", "Pakistan");
		super.addEntity("034", "034", "PH", "Philippines");
		//super.addEntity("035", "035", "QA", "Qatar");
		super.addEntity("036", "036", "RU", "Russian Federation");
		//super.addEntity("037", "037", "SA", "Saudi Arabia");
		super.addEntity("038", "038", "SG", "Singapore");
		super.addEntity("039", "039", "LK", "Sri Lanka");
		//super.addEntity("040", "040", "SY", "Syria");
		super.addEntity("041", "041", "TJ", "Tajikistan");
		super.addEntity("042", "042", "TH", "Thailand");
		//super.addEntity("043", "043", "TR", "Turkey");
		super.addEntity("044", "044", "TM", "Turkmenistan");
		//super.addEntity("045", "045", "AE", "United Arab Emirates");
		super.addEntity("046", "046", "UZ", "Uzbekistan");
		super.addEntity("047", "047", "VN", "Vietnam");
		//super.addEntity("048", "048", "YE", "Yemen ");
		super.addEntity("049", "049", "TW", "Taiwan");
		super.addEntity("050", "050", "HK", "Hong Kong");
		super.addEntity("051", "051", "MO", "Macau");
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
