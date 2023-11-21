var ug = {}; 
;(function(ug) {
    ug.csrftoken = $('meta[name="csrf-token"]').attr('content')
    ug.require	=  function ( $js ,$callback,$basePath){
                    var $n = 0;
                    for( var u=0;u < $js.length;u++ ){
                        
                        var script = document.createElement("script")
                        script.type = "text/javascript";
    
                        if (script.readyState){  //IE
                            script.onreadystatechange = function(){
                                if (script.readyState == "loaded" ||
                                        script.readyState == "complete"){
                                    script.onreadystatechange = null;
                                    $n++;
                                 if(typeof $callback == "function" && $n == $js.length  ) $callback();
                                }
                            };
                        } else {  //Others
                            script.onload = function(){
                                $n++;
                                if(typeof $callback == "function" && $n == $js.length ) $callback();
                            };
                        }
                        
                        if( $js[u].indexOf("http") == 0 || $js[u].indexOf("//")  == 0 ){
                            script.src =  $js[u] ;
                        }else{		
                            if ( typeof $basePath == "undefined" ){
                                script.src = "file/vendor/jquery/ug." + $js[u] + ".js";
                            }else{
                                script.src = $basePath  + $js[u] ;
                            }
                        }
                        
                        document.getElementsByTagName("head")[0].appendChild(script);
                    }
                };	
    // ECHART FUNCTION
    ug.echarts = function(selector, options){
        echarts.init($(selector)[0]).setOption(options);
    };

    ug.apexchart = function(selector, options){
        new ApexCharts($(selector)[0],options).render();
    };
    ug.alert = function(msg){ 
        BootstrapDialog.show({
            title : 'Information',
            message: msg
        });
    };
    ug.post = function(url, data = {}, func=false,$dataType, $opt, $type){
        if( typeof data != 'object'){
            return data;
        } 
        var $option = {
            headers: {
                'X-CSRF-Token': ug.csrftoken 
            },
            url: url,
            type: ( $type == undefined  || $type == 'undefined' ? "POST" : $type ),
            data: data,
            cache: false,
            dataType: ( $dataType == undefined || $dataType == 'undefined' ? "text" : $dataType ),
            };
            $.extend(true,$option, $opt || {} );
        var request = $.ajax( $option );
            request.done(function( resp ) {
                if(func == undefined){
                    ug.alert(resp);
                }else{ 
                    if(typeof func == 'function'){
                        func(resp);
                        return;
                    }
                    console.log(func);  
                    return resp;
                } 
            });
            request.fail(function( jqXHR, textStatus ) {
                if( jqXHR.status == 0 ) return false;
                if(  typeof $option["errorCallback"] == 'function' ){
                    $option["errorCallback"](jqXHR.responseText);
                }else{
                    $msg = JSON.stringify(jqXHR); 
                    if( $dataType == 'json') {
                        console.log(jqXHR.responseText);
                    }
                    ug.alert("ERROR CODE : " + jqXHR.status + ":::" + jqXHR.statusText);
                    func('error');
                }
            }); 
    };
    ug.serializeObject = function(idForm){
        var $form = $(idForm);
        var result = {};
        if( $form.attr("enctype") ==  "multipart/form-data" ) {
            result = new FormData( $form[0] );  
            return result;
        }
        var extend = function (i, element) {
            var value = element.value;
            var node = result[element.name];
            if ('undefined' !== typeof node && node !== null) {
                if ($.isArray(node)) {
                    node.push(value);
                } else {
                    result[element.name] = [node, value];
                }
            } else {
                result[element.name] = value;
            }
        };
        
        $.each($form.serializeArray(), extend); 
        return result;
    };
})( ug || {});


(function ($) {
	"use strict";
    $.fn.extend({
        myfunc : function(options, arg1,arg2,arg3,arg4,arg5) { 
            this.each(function() {
                 new $.MyFunc(this, options, arg1,arg2,arg3,arg4,arg5 );
            });
            return this;
        },
        MyModal : function($url, $data, $opt){
            new $.MyModal(this, $url, $data, $opt);
            return this;
        },
        ug: function(options, arg, arg1, arg2,arg3, arg4 ){
            if (options && typeof(options) == 'object') {
                options = $.extend( {}, ug.defaults, options );
            }
            this.each(function() {
                new ug.external(this,options, arg, arg1, arg2,arg3, arg4 );
            });
            return this;
        }
    });
    
    $.MyFunc = function( ctl, options, arg1,arg2,arg3,arg4,arg5) {
       alert(ctl)
    };
    $.MyModal = function( url, datapost, $opt) {
        if( datapost == undefined ) datapost = {};
	    var $option = {
					message: function(dialogRef){
						var $div =   $(`<div class="row ml-2 mr-2 mt-5 d-flex">
                                            <div class="col-md-12 text-center justify-content-center ">
                                                <div class="spinner-border text-primary "> 
                                                </div>
                                            </div>
                                        </div>`);
						return $div;
					},
					onshown: function(dialogRef){
						var $button = dialogRef.getModalHeader().find(".bootstrap-dialog-close-button");
                        $button.css({ 'display' : 'inline-block' }); 
						// $button.on('click', { dialogRef: dialogRef }, function(event){
						// 	event.data.dialogRef.close();
						// });

                        var $container = dialogRef.getModalBody().find("> .bootstrap-dialog-body > .bootstrap-dialog-message");

                        ug.post(url,datapost,function(resp){
                            $container.html(resp);
                        },"text",{}, "GET");
					},
					closable: true,
					hideHeader: false,
					hideFooter: false,
				};
	$.extend(true,$option, $opt || {} );
	
	var dialog = new BootstrapDialog( $option );
		
        dialog.realize();
          //dialog.getModalBody().css('padding', 1);
		var $modal = dialog.getModalDialog();
		if( $option.width != undefined )  	$modal.css({ 'width' : $option.width });
		if( $option.height != undefined )   $modal.css({ 'height' : $option.height });
		if( $option.hideHeader )  dialog.getModalHeader().hide();
        if( $option.hideFooter )  dialog.getModalFooter().hide();
        dialog.open();
		return dialog;
    };
    
    ug.external =  function( elem, opt, opt1,opt2,opt3,opt4) { 
        let thisMethod = {
            submit : function(form, nameindex, func,datataype,dataTambahan={}){
                let $form  = $(form);
                if($form.attr("enctype") ==  "multipart/form-data" ) {
                    dataTambahan = {
                        processData : false,
                        contentType : false
                    };
                }

                if( typeof $form.attr('action') == 'undefined'){ 
                    ug.alert('Error action not found!');
                    return;
                }
                let url = $form.attr('action');
                let $post = ug.serializeObject(elem); 
                let resp =  ug.post(url,$post,function(resp){
                    return func(resp)
                },datataype,dataTambahan);
                // return func(resp);
            }
        };
 
		if (thisMethod[opt]) {
            return  thisMethod[opt].call("",elem, opt, opt1, opt2,opt3,opt4);
        } else {
            console.log("Tidak menemukan method "+elem);
        }
    }
})(jQuery); 

$('body').on("DOMNodeInserted", function(event) {
        var $eTarget = $(event.target); 
            /**
             * Initiate tooltips
             */
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

        if( $eTarget.hasClass("content-page-first")){
            // $($eTarget).select2(); 
            // $($eTarget).select2({
            //     width: "100%"
            // });
            let html = $($eTarget).html(); 
            // find select2
            let select2 = $(html).find('select.cst-select2');
            if(select2){
                select2.each(function(i,$target){ 
                    let name = "." + $target.className;
                    $(name).select2({width:"100%"});
                }); 
                // theme:"bootstrap"

            } 
        } 
        
        // simple datatable instance
        if( $eTarget.find('table').hasClass("datatable")){
            let datatables = $eTarget.find('table.datatable');
            // console.log(datatables);
            $.each(datatables, function(i,v){
                new simpleDatatables.DataTable( v );
            }); 
        }
        // datatable
        if( $eTarget.find('table').hasClass("ug-table")){
            let ugtable = $eTarget.find('table.ug-table');
            // console.log(datatables);
            $.each(ugtable, function(i,v){
                $(v).DataTable();
                // new simpleDatatables.DataTable( v );
            });
        }
      
});