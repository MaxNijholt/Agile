$(function(){

	$( "#addPageSection" ).hide();
	var transferred = true;
	$( "#bottem li" ).draggable({
        connectToSortable: ".tree",
        helper: "clone",
                start: function(event, ui)
        {
            $(this).hide();

        },
        stop: function(event, ui)
        {
            if(!transferred)
                $(this).show();
            else
            {
                $(this).remove();
                transferred = false;
            }
        }
    });


    var onRecieve = function(event, ui) {

         transferred = true;
         var id = $(ui.item).attr("id");
         $(this).find('li').each(function() {
         		var name = ui.item.text();
            	if(name == $(this).text()){
            		if($(this).closest('ul').attr('id') == "bottem"){
            			$(this).replaceWith("<li class='tree-opened' id='"+id+"'><span class='toggler'></span><a href='#'>"+name+"</a></li>");
            		}
            		else{
            			if($(this).children(":first").text() != ""){

            			}
            			else{
                            $(this).replaceWith("<li class='tree-opened' id='"+id+"'><span class='toggler'></span><a href='#'>"+name+"</a><ul class='tree ui-sortable'></ul></li>");
	            		}
            		}
            	}
    	});
        $( ".tree" ).sortable(sortableOptions);
    }

    var sortableOptions = {
        revert: true,
        connectWith: ".tree",
        placeholder: "uiVisibilityClass",
        receive: onRecieve
   	};

   	$( ".tree" ).sortable(sortableOptions);

    $("#btnSubmit").click(function(){
    	var items = new Array();
    	var subCounter = 0;
    	var minusCounter = 0;
    	$("#top").find('li').each(function() {
    		var nav_item = "";
    		var page_order = 0;
    		var page_parent = "0";
    		var parentModule = $(this).closest("ul").closest("li").attr("id");
    		if(typeof parentModule == 'undefined'){
    			minusCounter = minusCounter + subCounter;
    			subCounter = 0;
    			page_order = (items.length-minusCounter);
    			nav_item = '{ "pag_id": "'+$(this).attr("id")+'","pag_order": "'+(items.length-minusCounter)+'", "pag_parent": "0", "pag_enabled": "1" }';

    		}
    		else{
    			nav_item = '{ "pag_id": "'+$(this).attr("id")+'","pag_order": "'+subCounter+'", "pag_parent": "'+parentModule+'", "pag_enabled": "1" }';
    			page_order = subCounter;
    			page_parent = parentModule;
    			subCounter = subCounter + 1;
    		}
				$.post('/paginabeheer/index/updatenav/', {
				    pag_id: $(this).attr("id"),
		            pag_order: page_order,
		            pag_parent: page_parent,
		            pag_enabled: "1"
				}, function(data, statusText) {
			});
    		items.push(nav_item);
    	});
		
		$("#bottem").find('li').each(function() {
			$.post('/paginabeheer/index/updatenav/', {
			    pag_id: $(this).attr("id"),
	            pag_order: "0",
	            pag_parent: null,
	            pag_enabled: "0"
			}, function(data, statusText) {
                console.log(data);
				});
		});
		

		$("#changeconfirm").toggleClass("alert alert-success");
        $( "#changeconfirm" ).text( "Navigatie is succesvol gewijzigd." );
    });

	
	$("#btcreatepage").click(function(){
		var $this = $(this); 
	    	var pag_name = $("#pagename").val();
            var pag_title = $("#pagetitel").val();
	    	if(pag_name != "" && pag_title != ""){
		    	$.post('/paginabeheer/index/insertpage/', {
				    pag_name: $("#pagename").val(),
                    pag_title: $("#pagetitel").val()
				}).done(function(data) {
					console.log(data);
					if(data != "Page already exists"){
                       document.getElementById("bottem").innerHTML += "<li id="+data+" class='ui-draggable tree-empty'><span class='toggler'></span><a href='#'>"+pag_name+"</a></li>";
		    			$("#pageValue").val("");
                        $("#pagetitel").val("");
                        $("#comfirmmessage").toggleClass("alert alert-success");
                        $( "#comfirmmessage" ).text( "Pagina is succesvol toegevoegd." );
		    		}
                    else
                    {
                        $("#comfirmmessage").toggleClass("alert alert-danger");
                        $( "#comfirmmessage" ).text( "Pagina bestaat al!" );
                    }
				});
			}
	});

    $.fn.openActive = function(activeSel) {
        activeSel = activeSel || ".active";

        var c = this.attr("class");

        this.find(activeSel).each(function(){
            var el = $(this).parent();
            while (el.attr("class") !== c) {
                if(el.prop("tagName") === 'UL') {
                    el.show();
                } else if (el.prop("tagName") === 'LI') {
                    el.removeClass('tree-closed');
                    el.addClass("tree-opened");
                }

                el = el.parent();
            }
        });

        return this;
    }

    $.fn.treemenu = function(options) {
        options = options || {};
        options.delay = options.delay || 0;
        options.openActive = options.openActive || true;
        options.activeSelector = options.activeSelector || "";

        this.find("> li").each(function() {
            e = $(this);
            var subtree = e.find('> ul');
            var toggler = $('<span>');
            toggler.addClass('toggler');

            e.prepend(toggler);
            if(subtree.length > 0) {
                subtree.hide();

                e.addClass('tree-closed');

                e.find(toggler).click(function() {
                    var li = $(this).parent('li');
                    li.find('> ul').toggle(options.delay);
                    li.toggleClass('tree-opened');
                    li.toggleClass('tree-closed');
                });

            } else {
                $(this).addClass('tree-empty');
            }
        });

        if (options.openActive) {
            this.openActive(options.activeSelector);
        }

        return this;
    }

});