Imports InfoSoftGlobal 'FusionMaps.dll in bin folder

Partial Class BasicArrayExample_dataXML
    Inherits System.Web.UI.Page

    ''' <summary>This Function will Help to Generate US Map.</summary>
    Protected Sub Page_Load(ByVal ob As Object, ByVal e As EventArgs) Handles Me.Load

        ' Declare array entity to store world population
        ' We use world map with 8 entities/continents
        ' this 2 dimensional array will store 8 rows of data for each continent of the map
        ' first column of each row will store the Internal Id of each entity on the map
        ' second column will store population data of each entity

        'Store population data
        Dim dataArray(7, 2) As String
        dataArray(0, 0) = "01"
        dataArray(0, 1) = "3779000000"
        dataArray(1, 0) = "02"
        dataArray(1, 1) = "727000000"
        dataArray(2, 0) = "03"
        dataArray(2, 1) = "877500000"
        dataArray(3, 0) = "04"
        dataArray(3, 1) = "421500000"
        dataArray(4, 0) = "05"
        dataArray(4, 1) = "379500000"
        dataArray(5, 0) = "06"
        dataArray(5, 1) = "80200000"
        dataArray(6, 0) = "07"
        dataArray(6, 1) = "32000000"
        dataArray(7, 0) = "08"
        dataArray(7, 1) = "179000000"

        'Now, we need to convert this data into XML. 
        'We convert using string concatenation.
        'Declare strXML to store dataXML of the map
        Dim strXML As New StringBuilder

        'Initialize <map> element
        strXML.Append("<map showLabels='1' includeNameInLabels='1' borderColor='FFFFFF' fillAlpha='80' showBevel='0' legendPosition='Bottom' >")

        'Set Color ranges : 4 color ranges for population ranges
        strXML.Append("<colorRange>")
        strXML.Append("<color minValue='0' maxValue='100000000' displayValue='Population : Below 100 M' color='CC0001' />")
        strXML.Append("<color minValue='100000000' maxValue='500000000' displayValue='Population :100 - 500 M' color='DDD33A' />")
        strXML.Append("<color minValue='500000000' maxValue='1000000000' displayValue='Population :500 - 1000 M' color='069F06' />")
        strXML.Append("<color minValue='1000000000' maxValue='5000000000' displayValue='Population : Above 1000 M' color='ABF456' />")
        strXML.Append("</colorRange>")

        'Open data element that will store map data
        strXML.Append("<data>")

        'Use Data from array for each entity
        Dim i As Integer
        For i = dataArray.GetLowerBound(0) To dataArray.GetUpperBound(0)
            'Set each map <entity> id and value
            strXML.Append("<entity id='" & dataArray(i, 0) & "' value='" & dataArray(i, 1) & "' />")
        Next

        'close data element
        strXML.Append("</data>")
        'close map element
        strXML.Append("</map>")

        'Create the Map with data contained in strXML 
        'and Return HTML output that embeds the Map
        'We use FusionCharts class of InfoSoftGlobal namespace (FusionMaps.dll in BIN folder)
        'RenderMap() generates the necessary HTML needed to render the map
        Dim mapHTML As String = FusionMaps.RenderMap("../Maps/FCMap_World8.swf", "", strXML.ToString(), "mapid", "600", "400", False, False)

        'embed the chart rendered as HTML into Literal - WorldPopulationMap
        WorldPopulationMap.Text = mapHTML


    End Sub
End Class
