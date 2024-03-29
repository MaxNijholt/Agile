$(function(){
    
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
        options.openActive = options.openActive || false;
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

                $(this).find('> ul').treemenu(options);
            } else {
                $(this).addClass('tree-empty');
            }
        });

        if (options.openActive) {
            this.openActive(options.activeSelector);
        }

        return this;
    }
})(jQuery);