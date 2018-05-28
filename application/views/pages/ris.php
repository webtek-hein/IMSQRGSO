    <div id="container">
      <div class="right-invoice">
        <section id="memo">
          
        <div class="clearfix"></div>

        <section id="client-info">
          <h2><b>REQUISITION AND ISSUE SLIP</b></h2>
          <span>City Government of Baguio</span>
        </section>
        
        <div class="clearfix"></div>

        
        <div class="tg-wrap">
          <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 720px">
            <thead>
                <tr>
                <th class="tg-yw41">
                  Division: <input type="text"> </input>
                  <br>
                  Office: <input type="text"> </input>
                </th>
                <th class="tg-yw42">Responsibility Center
                    <br>Code: <input type="text" size="15px"> </input>
                    <br>OBR#: <input type="text" size="15px"> </input>
                </th>
                <th class="tg-yw43" size="350px;">RIS No.: <input type="text" size="8px">
                    <br>AIR No.: <input type="text" size="8px">
                    <br>PR#:<input type="text" size="12px">
                </th>
                <th class="tg-yw44">Date:<input type="text" size="6px">
                    <br>Date:<input type="text" size="6px">
                </th>
          </tr>
          </thead>
      </table>
        <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 720px">
             <thead>
           <tr>
            <td class="tg-yw51"><b>REQUISITION</b></td>
            <td class="tg-yw52"><b>ISSUANCE</b></td>
           </tr>
            </thead>
        </table>

        <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 720px">
            <thead>
           <tr>
            <th class="thead1"><b>STOCK No.</b></th>
            <th class="thead1"><b>UNIT</b></th>
            <th class="thead2"><b>DESCRIPTION</b></th>
            <th class="thead1"><b>QUANTITY</b></th>
            <th class="thead1"><b>QUANTITY</b></th>
            <th class="thead3"><b>REMARKS</b></th>
           </tr>
           </thead>
           <tbody>
           <tr>
            <td class="tbody"></td>
            <td class="tbody"></td>
            <td class="tbody"></td>
            <td class="tbody"></td>
            <td class="tbody"></td>
            <td class="tbody"></td>
           </tr>
           </tbody>
           </table>

        <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 720px">
            <tfoot>
           <tr>
            <td class="tfoot1"><b>PURPOSE:</b></td>
            <td class="tfoot2">Maintinance Supply c/o GSO</td>
            </tr>
            <tfoot>
        </table>
        <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 720px">
          <tr>
            <td class="sign1"><b>SIGNATURE</b></td>
            <td class="sign"><b>Approved by:<hr></hr></b><input type="text"></td>
            <td class="sign"><b>Issues by:<hr></hr></b><input type="text"></td>
            <td class="sign"><b>Received by:<hr></hr></b><input type="text"></td>
          </tr>

          <tr>
            <td><b>PRINTED NAME</b></td>
            <td><input type="text" style="font-weight: bold; text-transform: uppercase;"></td>
            <td class="name"><b>BONIFACIO S. DE VERA</b></td>
            <td><input type="text" style="font-weight: bold; text-transform: uppercase;"></td>
          </tr>
          <tr>
            <td><b>DESIGNATION</b></td>
            <td><input type="text"></td>
            <td class="name">Admin Officer V</td>
            <td><input type="text"></td>
          </tr>
          <tr>
            <td><b>DATE</b></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
            <td><input type="text"></td>
          </tr>

        </table>

        </div>
        <input id="printpagebutton" type="button" value="Download" onclick="download()"/>
         </div>
 
        <div class="clearfix"></div>

<STYLE TYPE="text/css">
html {
  line-height: 1;
}


table {
  border-collapse: collapse;
  border-spacing: 0;
}


html, body {
  /* MOVE ALONG, NOTHING TO CHANGE HERE! */
}

/** 
 * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
 * Some browsers may require '!important' in oder to work properly but be careful with it.
 */
.clearfix {
  display: block;
  clear: both;
}

.x-hidden {
  display: none !important;
}

.hidden {
  display: none;
}

b, strong, .bold {
  font-weight: bold;
}

#container {
  font: normal 13px/1.4em 'Open Sans', Sans-serif;
  margin: 0 auto;
  min-height: 1158px;
  position: relative;
  width: 820px;
}

.right-invoice {
  padding: 50px 50px 50px 50px;
  min-height: 1078px;
}


#memo:after {
  content: '';
  display: block;
  clear: both;
}

#client-info {
  float: center;
  text-align: right;
  min-width: 220px;
  text-align: center;
}

#client-info span {
  display: block;
  min-width: 20px;
  text-align: center;
}
#client-info > span {
  color: #858585;
  font-size: 15px;
  margin-bottom: 20px;
}


input[type="text"] { 
    border: none 
}

table {
  table-layout: fixed;
}


/**table**/
.tg-wrap{
    border-style: solid;
    border-width: 1px;
}
.tg  {
  border-collapse:collapse;
  border-spacing:0;
  margin:0px auto;

}

.tg tr td {
    border-style: solid;
    border-width: 1px;
}
.tg td{
  font-family:Arial, sans-serif;
  font-size:12px;
  padding:5px 5px;
  border-style:solid;
  border-width:1px;
  overflow:hidden;
  word-break:normal;
}
.tg th{
  font-family:Arial, sans-serif;
  font-size:13px;
  font-weight:normal;
  padding:5px 5px;
  border-style:solid;
  border-width:1px;
  overflow:hidden;
  word-break:normal;
}
.tg .tg-yw41{
  vertical-align:top;
  width: 220px;
}

.tg .tg-yw42{
  vertical-align:top;
  width: 180px;
}

.tg .tg-yw43{
  vertical-align:top;
  width: 140px;
}

.tg .tg-yw44{
  vertical-align:top;
  width: 100px;
}

.tg .tg-yw51{
  vertical-align:top;
  width: 350px;
  height: 15px;
  text-align: center;
}

.tg .tg-yw52{
  vertical-align:top;
  width: 120px;
  height: 15px;
  text-align: center;
}

.tg .thead1{
  width: 30px;
  text-align: center;
}

.tg .thead2{
  width: 147px;
  text-align: center;
}

.tg .thead3{
  width: 50px;
  text-align: center;
}

.tg .tbody{
  height: 650px;
}

.tg .tfoot1{
  width: 57px;
}

.tg .tfoot2{
  width: 240px;
}

.tg .sign1{
  height: 40px;
  width: 143px;
  vertical-align: bottom;
}

.tg .sign{
  height: 55px;
  text-align: center;
  vertical-align: top;
}

.tg .sign hr {
    color: black;
    border-style: solid;
    border-width: 1px;
}

.tg .name{
  text-align: center;
}

#printpagebutton{
    margin-top: 20px;
}


@media print {
  /* Here goes your print styles */
   table { page-break-after:auto; }
  tr    { page-break-inside:avoid; page-break-after:auto; }
  td    { page-break-inside:avoid; page-break-after:auto; }
  thead { display:table-header-group;}
  tfoot { display:table-footer-group; }
  
}
@page {
  size: 21cm 29.7cm;   /*A4*
/  margin: 0; /*webkit says no*/
}

</STYLE>

<script type="text/javascript">
function download() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>