<div hidden id="AIRcont">
    <div class="card">
        <div class="card-body">
            <div id="air" class="right-invoice">
                <section id="memo">
                    <section id="client-info">
                        <img src="./assets/images/logo.png" style="width:50px; height:50px;"></img>
                        <h6><b>City Government of Baguio</b></h6>
                        <br>
                        <h6 style="margin-top:-10px;"><b>ACCEPTANCE AND INSPECTION REPORT</b></h6>
                    </section>
                </section>
                <div class="clearfix"></div>
                <div class="tg-wrap">
                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <thead>
                        <tr>
                            <th>
                                <h7 style="position:left; float:left;">Supplier: <input id="supplier" type="text">
                                </h7>
                                <h7 style="position:right; float:right;">Invoice No.: <input id="OR_no" type="text">
                                </h7>
                                <br></br>
                                <h7 style="position:left; float:left; margin-top:-10px;">PO No.: <input id="PO_num"
                                                                                                        type="text"> </input>
                                </h7>
                                <h7 style="position:right; float:right; margin-right:20px; margin-top:-13px;">
                                    AIR No.: <input type="text"></input></h7>
                                <br></br>
                                <h7 style="position:left; float:left; margin-top:-20px;">Requisitioning
                                    Office/Department: <input type="text"></input></h7>
                                <h7 style="position:right; float:right; margin-right:40px; margin-top:-20px;">
                                    Date: <input type="text"></input></h7>
                            </th>
                        </tr>
                        </thead>
                    </table>

                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <thead class="table-secondary">
                        <tr>
                            <th class="thead1"><b>ITEM</b></th>
                            <th class="thead1"><b>QUANTITY</b></th>
                            <th class="thead1"><b>UNIT</b></th>
                            <th class="thead2"><b>DESCIPTION</b></th>
                            <th class="thead1"><b>AMOUNT</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                        </tr>
                        </tbody>
                    </table>

                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <tfoot>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tfoot>
                    </table>
                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <tfoot>
                        <tr>
                            <td class="tfoot5" align="center">ACCEPTION</td>
                            <td class="tfoot6" align="center">INSPECTION</td>
                        </tr>
                        <tr>
                            <td class="tfoot7" valign="top">Date Received:
                                <input id="date_received" type="text">
                                <br></br>
                                <center> Complete
                                    <input type="radio" size="15px" class="input1" id="complete" checked name="rad">
                                    <br>
                                    <center>Partial
                                        <input type="radio" size="15px" class="input1" id="partial" name="rad">
                                        <br></br>

                                        <center><p style="margin-top:-10px;color: black;"><b> <input type="text"
                                                                                                     size="15px"
                                                                                                     class="input1"></b>
                                            </p>
                                            <hr width="200px">
                                            <span> <input type="text" size="15px" class="input1"> Officer</span>
                            </td>
                            <td class="tfoot8" valign="top">Date Inspected: <input type="text" size="15px"
                                                                                   class="input1"></input>
                                <br></br>
                                <p style="margin-left:75px; margin-top:-10px; font-size: small;">Inspected,
                                    verified and found acceptable</p>
                                <p style="margin-left:75px; margin-top:-20px; font-size: small;"> as to
                                    quantity and specifications</p></input>
                                <br></br>
                                <center><p style="margin-top:-10px; color: black;"><b> <input type="text" size="15px"
                                                                                              class="input1"></b>
                                    </p>
                                    <hr></hr>
                                    <span>GSO Inspector</span>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <br></br>
                <hr width="300px"></hr>
                <center><b>END-USER</b></center>


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
                        width: 850px;
                        width: 850px;
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
                        border: none;
                        background-color: ghostwhite;
                    }

                    table {
                        table-layout: fixed;
                    }

                    /**table**/
                    .tg-wrap {
                        border-style: solid;
                        border-width: 1px;
                    }

                    .tg {
                        border-collapse: collapse;
                        border-spacing: 0;
                        margin: 0px auto;

                    }

                    .tg tr td {
                        border-style: solid;
                        border-width: 1px;
                    }

                    .tg td {
                        font-family: Arial, sans-serif;
                        font-size: 12px;
                        padding: 5px 5px;
                        border-style: solid;
                        border-width: 1px;
                        overflow: hidden;
                        word-break: normal;
                    }

                    .tg th {
                        font-family: Arial, sans-serif;
                        font-size: 13px;
                        font-weight: normal;
                        padding: 5px 5px;
                        border-style: solid;
                        border-width: 1px;
                        overflow: hidden;
                        word-break: normal;
                    }

                    .tg .tg-yw41 {
                        vertical-align: top;
                        width: 220px;
                    }

                    .tg .tg-yw42 {
                        vertical-align: top;
                        width: 180px;
                    }

                    .tg .tg-yw43 {
                        vertical-align: top;
                        width: 140px;
                    }

                    .tg .tg-yw44 {
                        vertical-align: top;
                        width: 100px;
                    }

                    .tg .tg-yw51 {
                        vertical-align: top;
                        width: 350px;
                        height: 15px;
                        text-align: center;
                    }

                    .tg .tg-yw52 {
                        vertical-align: top;
                        width: 120px;
                        height: 15px;
                        text-align: center;
                    }

                    .tg .thead1 {
                        width: 30px;
                        text-align: center;
                    }

                    .tg .thead2 {
                        width: 147px;
                        text-align: center;
                    }

                    .tg .thead3 {
                        width: 50px;
                        text-align: center;
                    }

                    .tg .tbody {
                        height: 450px;
                    }

                    .tg .tfoot1 {
                        width: 57px;
                    }

                    .tg .tfoot2 {
                        width: 240px;
                    }

                    .tg .tfoot3 {
                        height: 100px;
                    }

                    .tg .tfoot4 {
                        height: 100px;
                    }

                    .tg .tfoot5 {
                        width: 300px;
                    }

                    .tg .tfoot7 {
                        height: 170px;
                    }

                    .tg .sign1 {
                        height: 40px;
                        width: 143px;
                        vertical-align: bottom;
                    }

                    .tg .sign {
                        height: 55px;
                        text-align: center;
                        vertical-align: top;
                    }

                    .tg .sign hr {
                        color: black;
                        border-style: solid;
                        border-width: 1px;
                    }

                    .tg .name {
                        text-align: center;
                    }

                    #printpagebutton {
                        margin-top: 20px;
                    }

                    @media print {
                        /* Here goes your print styles */
                        table {
                            page-break-after: auto;
                        }

                        tr {
                            page-break-inside: avoid;
                            page-break-after: auto;
                        }

                        td {
                            page-break-inside: avoid;
                            page-break-after: auto;
                        }

                        thead {
                            display: table-header-group;
                        }

                        tfoot {
                            display: table-footer-group;
                        }
                    }

                    }
                    @page {
                        size: 21cm 29.7cm;   /*A4*/
                        margin: 0; /*webkit says no*/
                    }

                </STYLE>
            </div>
        </div>
        <button onclick="printAIR()" class="btn btn-primary">PRINT</button>
    </div>
</div>
