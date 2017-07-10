(function ($) {
    function initialize_field($field) {
        var input = $field.find('.acf-input input');
        var allowClear = $(input).attr('data-allow-clear') || 0;
        var opts = {
            dropdownCssClass: "bigdrop widefat",
            dropdownAutoWidth: true,
            formatResult: svg_icon_format,
            formatSelection: svg_icon_format_small,
            data: { results : svg_icon_format_data },
            allowClear: 1 == allowClear
        };

        input.select2( opts );

        /**
         * Format the content in select 2
         *
         * @param css
         * @returns {string}
         */
        function svg_icon_format(css) {
            return '<svg class="acf_svg__icon icon '+ css.id +'" aria-hidden="true" role="img"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#'+ css.id +'"></use> </svg>'+ css.text;
        }

        /**
         * Format the content in select 2
         *
         * @param css
         * @returns {string}
         */
        function svg_icon_format_small(css) {
            return '<svg class="acf_svg__icon small icon '+ css.id +'" aria-hidden="true" role="img"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#'+ css.id +'"></use> </svg>'+ css.text;
        }

    }

        /*
         *  ready append (ACF5)
         *
         *  These are 2 events which are fired during the page load
         *  ready = on page load similar to jQuery(document).ready()
         *  append = on new DOM elements appended via repeater field
         *
         *  @type	event
         *  @date	20/07/13
         *
         *  @param	jQueryel (jQuery selection) the jQuery element which contains the ACF fields
         *  @return	n/a
         */

        acf.add_action('ready append', function (jQueryel) {
            // search jQueryel for fields of type 'FIELD_NAME'
            acf.get_fields({type: 'svg_icon'}, jQueryel).each(function () {
                initialize_field($(this));
            });
        });
})(jQuery);