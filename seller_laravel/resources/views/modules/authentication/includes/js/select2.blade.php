<script>
    // Class definition
    var KTSelect2 = function() {
        // Private functions
        var demos = function() {
            // basic
            $('#category_id').select2({
                placeholder: "{{ __('messages.select_your_store_primary_cat') }}"
            });

        }

        // Public functions
        return {
            init: function() {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function() {
        KTSelect2.init();
    });
</script>
